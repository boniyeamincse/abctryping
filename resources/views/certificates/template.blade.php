<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }

        body {
            font-family: 'Times New Roman', serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        .certificate-container {
            width: 100%;
            height: 100%;
            background-color: white;
            border: 15px solid #003366;
            position: relative;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            box-sizing: border-box;
        }

        .certificate-header {
            text-align: center;
            padding: 15px 0;
            border-bottom: 2px solid #003366;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 10px;
        }

        .certificate-title {
            font-size: 32px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .certificate-subtitle {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
            font-style: italic;
        }

        .certificate-content {
            padding: 0 30px;
            text-align: center;
            height: 70%;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .certificate-body {
            margin: 20px 0;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .certificate-text {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 20px;
        }

        .user-name {
            font-size: 26px;
            font-weight: bold;
            color: #003366;
            margin: 15px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .level-name {
            font-size: 22px;
            font-weight: bold;
            color: #006699;
            margin: 10px 0;
            font-style: italic;
        }

        .certificate-details {
            display: flex;
            justify-content: space-between;
            margin-top: 25px;
            font-size: 14px;
            color: #555;
            padding: 0 20px;
        }

        .certificate-code {
            font-weight: bold;
            color: #003366;
        }

        .certificate-date {
            font-style: italic;
        }

        .certificate-stats {
            margin-top: 20px;
            display: flex;
            justify-content: space-around;
            padding: 15px;
            background-color: #f0f8ff;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .stat-item {
            text-align: center;
            padding: 0 10px;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .stat-value {
            font-size: 18px;
            font-weight: bold;
            color: #003366;
        }

        .signature-line {
            margin: 20px 0;
            height: 40px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .signature {
            text-align: center;
            width: 180px;
        }

        .signature-name {
            font-size: 14px;
            font-weight: bold;
            margin-top: 8px;
            border-top: 1px solid #333;
            padding-top: 3px;
        }

        .signature-title {
            font-size: 12px;
            color: #666;
            margin-top: 3px;
        }

        .certificate-footer {
            text-align: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #ddd;
            font-size: 12px;
            color: #666;
            padding: 0 20px;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 48px;
            color: rgba(0, 51, 102, 0.1);
            font-weight: bold;
            z-index: -1;
            pointer-events: none;
            user-select: none;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="watermark">ABC TYPING</div>

        <div class="certificate-header">
            <div class="logo">ABC TYPING ACADEMY</div>
            <div class="certificate-title">CERTIFICATE OF COMPLETION</div>
            <div class="certificate-subtitle">Recognizing Excellence in Typing Skills</div>
        </div>

        <div class="certificate-content">
            <div class="certificate-body">
                <div class="certificate-text">
                    This is to certify that
                </div>

                <div class="user-name">
                    {{ $user->name }}
                </div>

                <div class="certificate-text">
                    has successfully completed the
                </div>

                <div class="level-name">
                    {{ $level->name }} Typing Course
                </div>

                <div class="certificate-text">
                    with outstanding performance and dedication to learning.
                </div>
            </div>

            <div class="certificate-stats">
                <div class="stat-item">
                    <div class="stat-label">Best WPM</div>
                    <div class="stat-value">{{ $stats['best_wpm'] ?? 'N/A' }}</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Best Accuracy</div>
                    <div class="stat-value">{{ $stats['best_accuracy'] ?? 'N/A' }}%</div>
                </div>
                <div class="stat-item">
                    <div class="stat-label">Certificate Code</div>
                    <div class="stat-value">{{ $certificate_code }}</div>
                </div>
            </div>

            <div class="signature-line">
                <div class="signature">
                    <div class="signature-name">John Doe</div>
                    <div class="signature-title">ABC Typing Academy</div>
                </div>
                <div class="signature">
                    <div class="signature-name">Jane Smith</div>
                    <div class="signature-title">Lead Instructor</div>
                </div>
            </div>

            <div class="certificate-details">
                <div class="certificate-code">
                    Certificate Code: {{ $certificate_code }}
                </div>
                <div class="certificate-date">
                    Issued on: {{ $issued_at }}
                </div>
            </div>
        </div>

        <div class="certificate-footer">
            This is an official certificate from ABC Typing Academy. Certificate Code: {{ $certificate_code }}
        </div>
    </div>
</body>
</html>