<?php
session_start();

if (!isset($_SESSION['license_valid']) || $_SESSION['license_valid'] !== true) {
    header("Location: check.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template</title>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #000;
            color: #e0e0e0;
            font-family: 'JetBrains Mono', monospace;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 1.6;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            opacity: 0;
            filter: blur(10px);
            transition: all 1s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .enter-text {
            cursor: pointer;
            color: #666;
            font-size: 1.2rem;
            letter-spacing: 2px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.5s ease;
        }

        .enter-text::after {
            content: '_';
            animation: blink 1s infinite;
        }

        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        .showcase img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin: 2rem 0;
            border: 1px solid #333;
            filter: brightness(0.8) contrast(1.2);
            transition: all 0.5s ease;
            animation: pulseGlow 4s infinite;
        }

        .showcase img:hover {
            filter: brightness(1) contrast(1.1);
            border-color: #444;
            transform: scale(1.01);
        }

        @keyframes pulseGlow {
            0% { box-shadow: 0 0 0 rgba(255, 255, 255, 0); }
            50% { box-shadow: 0 0 20px rgba(255, 255, 255, 0.1); }
            100% { box-shadow: 0 0 0 rgba(255, 255, 255, 0); }
        }

        .features {
            text-align: left;
            margin: 2rem 0;
            padding: 1.5rem;
            border: 1px solid #333;
            background: rgba(255, 255, 255, 0.03);
        }

        .feature-item {
            color: #666;
            margin: 0.5rem 0;
        }

        .feature-item span {
            color: #e0e0e0;
        }
        
        .feature-title {
            color: #fff;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }

        .matrix-rain {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 1;
            opacity: 0;
            transition: opacity 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        }


        input {
            padding: 5px;
            width: 300px;
            margin: 10px 0;
            border: 1px solid #555;
            border-radius: 5px;
            background: #222;
            color: white;
        }

        input:focus {
            outline: none;
        }

        button {
            padding: 5px 10px;
            background: #313131;
            border: 1px solid #555;
            color: rgb(179, 179, 179);
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

        <div id="content">
        <div class="features">
            <div class="feature-title"><span>Template</span></div>

            <div class="feature-item">[@] <span>Welcome to the secure page! Your license key was validated.</span></div>
        </div>
        
        <div class="links">
            <span class="note-item" onclick="copyToClipboard('https://github.com/kill-your-self')">ds</span>
            <span style="margin: 0 5px; color: #666;"> | </span>
            <span class="note-item" onclick="copyToClipboard('https://github.com/kill-your-self')">tg</span>
        </div>
        
        <div class="footer">
            2025... ©
        </div>
    </div>

    <script>
        document.getElementById('enter').addEventListener('click', function() {
            this.style.opacity = '0';
            
            setTimeout(() => {
                this.style.display = 'none';
                const content = document.getElementById('content');
                content.classList.remove('hidden');
                
                requestAnimationFrame(() => {
                    content.classList.add('visible');
                });
            }, 500);
        });

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                const notification = document.createElement('div');
                notification.style.position = 'fixed';
                notification.style.top = '20px';
                notification.style.left = '50%';
                notification.style.transform = 'translateX(-50%)';
                notification.style.background = 'rgba(255, 255, 255, 0.1)';
                notification.style.color = '#fff';
                notification.style.padding = '10px 20px';
                notification.style.borderRadius = '5px';
                notification.style.zIndex = '1000';
                notification.textContent = 'Copied to clipboard';
                
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.style.opacity = '0';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 1500);
            });
        }

        document.querySelectorAll('.note-item').forEach(item => {
            item.style.cursor = 'pointer';
            item.style.transition = 'color 0.3s';
            
            item.addEventListener('mouseover', () => {
                item.style.color = '#fff';
            });
            
            item.addEventListener('mouseout', () => {
                item.style.color = '';
            });
        });
    </script>
</body>
</html>
