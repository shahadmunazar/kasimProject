import os
import subprocess
import time

def run(cmd):
    subprocess.run(cmd, shell=True, check=True)

img_dir = 'public/assets/img'
files = []
for root, dirs, filenames in os.walk(img_dir):
    for f in filenames:
        files.append(os.path.join(root, f))

batch_size = 5 * 1024 * 1024 # 5 MB per batch
current_batch = []
current_size = 0
batch_num = 1

for f in files:
    size = os.path.getsize(f)
    current_batch.append(f)
    current_size += size
    if current_size >= batch_size:
        print(f"Pushing batch {batch_num} with {len(current_batch)} files...")
        for bf in current_batch:
            run(f'git add "{bf}"')
        run(f'git commit -m "Add images batch {batch_num}"')
        run('git push origin main')
        current_batch = []
        current_size = 0
        batch_num += 1

if current_batch:
    print(f"Pushing final batch {batch_num} with {len(current_batch)} files...")
    for bf in current_batch:
        run(f'git add "{bf}"')
    run(f'git commit -m "Add images batch {batch_num}"')
    run('git push origin main')

print("All images pushed!")
