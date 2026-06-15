from PIL import Image

def remove_white_background_aa(img_path, out_path):
    img = Image.open(img_path).convert("RGBA")
    width, height = img.size
    
    for y in range(height):
        for x in range(width):
            r, g, b, a = img.getpixel((x, y))
            # Calculate how dark the pixel is (0 = white, 765 = black)
            darkness = (255 - r) + (255 - g) + (255 - b)
            
            if darkness < 20: 
                # Very close to white -> fully transparent
                img.putpixel((x, y), (r, g, b, 0))
            elif darkness < 180: 
                # Anti-aliased edges -> partial transparency
                # Keep the original color but reduce opacity
                alpha = int((darkness - 20) / 160 * 255)
                img.putpixel((x, y), (r, g, b, alpha))
                
    bbox = img.getbbox()
    if bbox:
        img = img.crop(bbox)
        
    img.save(out_path, "PNG")
    print(f"Saved transparent logo to {out_path}")

remove_white_background_aa("public/images/logo-n.png", "public/images/logo-n-trans.png")
