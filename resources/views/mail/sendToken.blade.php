<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>توکن دسترسی شما</title>
    <style>
        body {
            font-family: Tahoma, Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #6366f1;
            margin-bottom: 10px;
        }
        .token-box {
            background-color: #f8fafc;
            border: 2px dashed #e2e8f0;
            padding: 15px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            font-family: monospace;
            font-size: 20px;
            letter-spacing: 2px;
        }
        .warning {
            color: #dc2626;
            font-size: 14px;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #6b7280;
        }
        .docs-section {
            background-color: #f0f9ff;
            border: 1px solid #bae6fd;
            padding: 20px;
            border-radius: 8px;
            margin: 30px 0;
        }
        
        .docs-section h3 {
            color: #0369a1;
            margin-top: 0;
        }
        
        .endpoint {
            background-color: #ffffff;
            padding: 10px 15px;
            border-radius: 6px;
            margin: 10px 0;
            font-family: monospace;
        }
        
        .method {
            display: inline-block;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 14px;
            font-weight: bold;
            margin-right: 8px;
        }
        
        .get { background-color: #dcfce7; color: #166534; }
        .post { background-color: #dbeafe; color: #1e40af; }
        .delete { background-color: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">Todo API</div>
            <p>سلام {{ $name ?? 'کاربر عزیز' }}</p>
        </div>

        <p>توکن دسترسی شما به API ایجاد شد. لطفاً این توکن را در جای امنی نگهداری کنید:</p>

        <div class="token-box">
            {{ $token }}
        </div>

        <div class="docs-section">
            <h3>🔍 راهنمای سریع API</h3>
            
            <p>نمونه درخواست‌های اصلی:</p>
            
            <div class="endpoint">
                <span class="method get">GET</span>
                <code>https://todo.zmat24.ir/api/tasks</code>
                <div>دریافت لیست تسک‌ها</div>
            </div>
            
            <div class="endpoint">
                <span class="method post">POST</span>
                <code>https://todo.zmat24.ir/api/tasks</code>
                <div>ایجاد تسک جدید</div>
            </div>
            
            <div class="endpoint">
                <span class="method delete">DELETE</span>
                <code>https://todo.zmat24.ir/api/tasks/{id}</code>
                <div>حذف تسک</div>
            </div>
            
            <p>برای مشاهده مستندات کامل API به آدرس زیر مراجعه کنید:</p>
            <div class="endpoint">
                <a href="https://todo.zmat24.ir/docs/api" style="color: #0369a1; text-decoration: none;">
                    https://todo.zmat24.ir/docs/api
                </a>
            </div>
        </div>

        <div class="warning">
            ⚠️ هشدار: این توکن را با کسی به اشتراک نگذارید. این توکن دسترسی کامل به حساب شما را فراهم می‌کند.
        </div>

        <p>برای استفاده از API، این توکن را در هدر درخواست‌های خود به صورت زیر قرار دهید:</p>
        <div class="token-box" style="font-size: 16px;">
            Provider: {{ $token }}
        </div>

        <div class="footer">
            <p>اگر شما این درخواست را ارسال نکرده‌اید، لطفاً این ایمیل را نادیده بگیرید.</p>
            <p>با تشکر<br>تیم Zmat24</p>
        </div>
    </div>
</body>
</html>
