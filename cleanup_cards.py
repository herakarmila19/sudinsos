#!/usr/bin/env python
import re
from pathlib import Path

# Read the file
file_path = Path(r'app\Views\frontend\_include\beranda\selamat_datang.php')
text = file_path.read_text(encoding='utf-8')

# Remove the unused Harga Pangan comment block and keep only the comment
pattern = r'\n\s*<!-- Harga Pangan -->\n\s*<!--\s*\n.*?-->\n'
new_text = re.sub(pattern, '\n', text, flags=re.DOTALL)

# Write back
file_path.write_text(new_text, encoding='utf-8')
print('Cleaned up view file successfully')
