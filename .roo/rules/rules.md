"# Cline Rules - Quy tắc và Best Practices


## Xử lý File Names với Dấu Cách trong Extension


### Vấn đề
Khi file có dấu cách trước extension (ví dụ: `file.  ext`, `script.  js`, `data.  json`), việc đọc file có thể gặp lỗi do:
- Copy/paste tên file tự động thêm dấu cách
- Hệ thống tự động format/parse path không đúng
- Tool `read_file` và `execute_command` không tìm thấy file


Áp dụng cho MỌI extension: `. py`, `.js`, `.ts`, `.json`, `.md`, `.txt`, `.yml`, `.xml`, v.v.


### Giải pháp


#### Bước 1: LUÔN LUÔN xác định tên file từ Current Working Directory
ĐÂY LÀ CÁCH TỐT NHẤT - Lấy tên chính xác từ `environment_details`:


1.  Tìm trong section "Current Working Directory Files"
2. Copy tên file CHÍNH XÁC từ đó (không gõ tay)
3. Sử dụng trực tiếp với `read_file`


```
# Từ environment_details:
backend/hand_controller.py     Copy tên này
frontend/App.tsx               Copy tên này
config/settings.json           Copy tên này
```


#### Bước 2: Verify với ls command (nếu cần)
Nếu không thấy trong Current Working Directory listing:


```bash
# List files để xem tên chính xác
ls -la <directory>/ | grep <filename_pattern>


# Ví dụ:
ls -la backend/ | grep hand_controller
ls -la frontend/src/ | grep App
ls -la config/ | grep settings
```


#### Bước 3: Sử dụng Wildcard Pattern (Last resort)
Khi gặp lỗi file not found và không thể xác định tên chính xác:


```bash
# Python files
cat backend/script.  *        # Match script.py
cat utils/helper.  *          # Match helper.py


# JavaScript/TypeScript files
cat frontend/App.  *          # Match App. tsx, App.ts, App.js
cat components/Button.  *     # Match Button.jsx, Button.tsx


# Config files
cat config/settings.  *       # Match settings.json, settings.yml
cat . eslintrc.  *            # Match .eslintrc.js, .eslintrc.json


# Documentation
cat docs/README.  *          # Match README.md
cat notes.  *                # Match notes.txt
```


#### Bước 4: Sử dụng tên file chính xác với read_file
Sau khi xác định tên chính xác:


```xml
<!-- Python -->
<read_file>
<path>backend/hand_controller. py</path>
</read_file>


<!-- JavaScript/TypeScript -->
<read_file>
<path>frontend/src/App.tsx</path>
</read_file>


<!-- JSON -->
<read_file>
<path>config/settings.json</path>
</read_file>


<!-- Markdown -->
<read_file>
<path>docs/README.md</path>
</read_file>
```


### Best Practices


1. LUÔN copy tên từ Current Working Directory Files:
- Đây là source tin cậy nhất
- Tránh 100% lỗi do dấu cách
- Không cần verify thêm


2. Nếu cần verify, dùng ls -la:
   ```bash
ls -la <directory>/ | grep <pattern>
   ```


3. TUYỆT ĐỐI KHÔNG gõ tay extension:
-  KHÔNG gõ: `. py`, `.js`, `.json`, v.v.
-  LUÔN copy từ listing
- Hệ thống có thể tự thêm dấu cách


4. Test file existence trước:
   ```bash
# Test bất kỳ file nào
test -f <path/to/file> && echo "File exists" || echo "Not found"
# Ví dụ:
test -f backend/main.py && echo "File exists"
test -f frontend/package.json && echo "File exists"
   ```


### Ví dụ Thực Tế


#### Case 1: Python file
```xml
<!--  Lỗi: có dấu cách -->
<read_file>
<path>backend/controller.  py</path>
</read_file>


<!--  Đúng: copy từ listing -->
<read_file>
<path>backend/controller.py</path>
</read_file>
```


#### Case 2: TypeScript/JavaScript file
```xml
<!--  Lỗi -->
<read_file>
<path>src/App.  tsx</path>
</read_file>


<!--  Đúng -->
<read_file>
<path>src/App.tsx</path>
</read_file>
```


#### Case 3: JSON config file
```xml
<!--  Lỗi -->
<read_file>
<path>config/settings.  json</path>
</read_file>


<!--  Đúng -->
<read_file>
<path>config/settings.json</path>
</read_file>
```


#### Case 4: Markdown file
```xml
<!--  Lỗi -->
<read_file>
<path>docs/README.  md</path>
</read_file>


<!--  Đúng -->
<read_file>
<path>docs/README. md</path>
</read_file>
```


### Wildcard Pattern Examples


```bash
# Python
cat *.  py                    # All Python files in current dir
cat backend/*.   py            # All Python in backend/
cat **/*.  py                 # Recursive (if shell supports)


# JavaScript/TypeScript
cat src/*.  js                # All . js files
cat src/*.   ts                # All .ts files  
cat components/*.  tsx        # All .tsx files


# Config files
cat *.  json                  # All JSON files
cat *.  yml                   # All YAML files
cat .   *rc                    # All rc files (. eslintrc, .babelrc, etc.)


# Documentation
cat *.  md                    # All Markdown files
cat docs/*.  txt              # All text files in docs/
```


### Checklist


- [ ] Check "Current Working Directory Files" trong environment_details
- [ ] Copy tên file CHÍNH XÁC từ listing (KHÔNG gõ tay)
- [ ] Nếu không có trong listing, verify với `ls -la | grep`
- [ ] Sử dụng wildcard `*` nếu vẫn gặp lỗi
- [ ] Test file existence với `test -f` trước khi read


---"


