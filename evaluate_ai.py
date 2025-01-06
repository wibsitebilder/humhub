import requests
import subprocess
import sys
import os
import json
import unittest
from typing import Callable

# Install HumanEval requirements
def install_humaneval():
    repo_url = "https://github.com/openai/human-eval.git"
    if not os.path.exists("human-eval"):
        subprocess.run(["git", "clone", repo_url], check=True)
    subprocess.run([sys.executable, "-m", "pip", "install", "-r", "human-eval/requirements.txt"], check=True)

# Load HumanEval problems
def load_problems():
    with open("human-eval/data/HumanEval.jsonl", "r") as f:
        problems = [json.loads(line) for line in f]
    return problems

# Test generated code
def run_test(code: str, test_case: str):
    try:
        exec_globals = {}
        exec(code, exec_globals)  # Execute the user's solution
        exec_globals.update({"assert": unittest.TestCase().assertTrue})
        exec(test_case, exec_globals)  # Run the test cases
        return True
    except Exception as e:
        return False

# Function to generate code using Dify API
def generate_code_dify(prompt: str) -> str:
    url = "https://api.dify.ai/v1/chat-messages"
    headers = {
        "Authorization": "Bearer app-1KojqNYOiPgZt7qvCo67zAmL",
        "Content-Type": "application/json"
    }
    payload = {
        "inputs": {},
        "query": prompt,
        "response_mode": "blocking",
        "conversation_id": "",
        "user": "abc-123"
    }

    response = requests.post(url, headers=headers, json=payload)
    if response.status_code == 200:
        data = response.json()
        return data.get("answer", "def solution():\n    pass\n")  # Fallback in case no code is returned
    else:
        print(f"Error: {response.status_code}, {response.text}")
        return "def solution():\n    pass\n"  # Fallback code

# Evaluate AI model
def evaluate_model(generate_code: Callable[[str], str]):
    problems = load_problems()
    pass_count = 0

    for i, problem in enumerate(problems):
        print(f"Evaluating Problem {i+1}/{len(problems)}: {problem['task_id']}")
        prompt = problem["prompt"]
        test_case = problem["test"]

        # Generate code from the AI model
        generated_code = generate_code(prompt)

        # Test the generated code
        if run_test(generated_code, test_case):
            print(f"✅ Problem {problem['task_id']} passed")
            pass_count += 1
        else:
            print(f"❌ Problem {problem['task_id']} failed")
    
    # Calculate and print the success percentage
    success_rate = (pass_count / len(problems)) * 100
    print(f"\nEvaluation complete. Success Rate: {success_rate:.2f}%")
    return success_rate

if __name__ == "__main__":
    install_humaneval()  # Install HumanEval
    os.chdir("human-eval")  # Navigate to the HumanEval directory
    evaluate_model(generate_code_dify)  # Use Dify API for code generation
