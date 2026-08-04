import os
import subprocess
import shutil

cwd = r"c:\Users\Administrator\.gemini\antigravity-ide\scratch\next-young-tech"
public_dir = os.path.join(cwd, "public", "business-card")
artifacts_dir = r"C:\Users\Administrator\.gemini\antigravity-ide\brain\0542cc36-0c36-46cc-96ce-beea5fc01d21"

os.makedirs(public_dir, exist_ok=True)
os.makedirs(artifacts_dir, exist_ok=True)

chrome_path = r"C:\Program Files\Google\Chrome\Application\chrome.exe"
edge_path = r"C:\Program Files (x86)\Microsoft\Edge\Application\msedge.exe"
browser = chrome_path if os.path.exists(chrome_path) else edge_path

print("Using browser:", browser)

def render(html_file, pdf_name, png_name=None, window_size="1200,1650"):
    html_path = os.path.join(cwd, html_file)
    pdf_path = os.path.join(cwd, pdf_name)
    
    html_url = "file:///" + html_path.replace("\\", "/")
    
    print(f"Rendering {html_file} to PDF: {pdf_path}")
    cmd_pdf = [
        browser,
        "--headless=new",
        "--disable-gpu",
        "--no-margins",
        "--print-to-pdf-no-header",
        "--enable-local-file-access",
        f"--print-to-pdf={pdf_path}",
        html_url
    ]
    res_pdf = subprocess.run(cmd_pdf, cwd=cwd, capture_output=True, text=True)
    print("PDF returncode:", res_pdf.returncode)
    if not os.path.exists(pdf_path):
        print("ERROR: PDF was not created!", res_pdf.stderr)
    else:
        print("SUCCESS: Created", pdf_path, "Size:", os.path.getsize(pdf_path))
        shutil.copy(pdf_path, os.path.join(public_dir, pdf_name))
        shutil.copy(pdf_path, os.path.join(artifacts_dir, pdf_name))
        print("Copied PDF to public/business-card and artifacts.")

    if png_name:
        png_path = os.path.join(cwd, png_name)
        print(f"Rendering {html_file} to PNG: {png_path}")
        cmd_png = [
            browser,
            "--headless=new",
            "--disable-gpu",
            f"--window-size={window_size}",
            "--enable-local-file-access",
            f"--screenshot={png_path}",
            html_url
        ]
        res_png = subprocess.run(cmd_png, cwd=cwd, capture_output=True, text=True)
        print("PNG returncode:", res_png.returncode)
        if os.path.exists(png_path):
            print("SUCCESS: Created", png_path, "Size:", os.path.getsize(png_path))
            shutil.copy(png_path, os.path.join(public_dir, png_name))
            shutil.copy(png_path, os.path.join(artifacts_dir, png_name))
            print("Copied PNG to public/business-card and artifacts.")

# 1. Render Template Mockup Sheet (A4 Presentation like the photo)
render("business_card_template.html", "NextYoungTech_BusinessCard_Template.pdf", "NextYoungTech_BusinessCard_Template.png", "1200,1650")

# 2. Render Standalone Print-Ready 85x55mm Cards (2-Page PDF)
render("business_card_print.html", "NextYoungTech_BusinessCard_PrintReady.pdf", "NextYoungTech_BusinessCard_PrintReady.png", "900,1200")
