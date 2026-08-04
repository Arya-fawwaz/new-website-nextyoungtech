import os

filepath = r'c:\Users\Administrator\.gemini\antigravity-ide\scratch\next-young-tech\resources\views\layouts\app.blade.php'

with open(filepath, 'r', encoding='utf-8') as f:
    lines = f.readlines()

start_idx = -1
end_idx = -1
for i, line in enumerate(lines):
    if '<!-- Nova AI Chatbot Floating Widget -->' in line:
        start_idx = i
    if '// ==========================================================================' in line and i + 1 < len(lines) and 'PWA Installation' in lines[i+1]:
        end_idx = i

if start_idx != -1 and end_idx != -1:
    del lines[start_idx:end_idx]
    with open(filepath, 'w', encoding='utf-8') as f:
        f.writelines(lines)
    print(f"Removed lines {start_idx} to {end_idx}")
else:
    print(f"Could not find start or end markers. Start: {start_idx}, End: {end_idx}")
