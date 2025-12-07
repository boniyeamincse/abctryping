<!DOCTYPE html>
<html>
<head>
    <title>Certificate of Completion</title>
    <style>
        body {
            font-family: 'Times New Roman', serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .certificate-container {
            width: 800px;
            height: 600px;
            margin: 50px auto;
            background-color: white;
            border: 20px solid #003366;
            position: relative;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .certificate-header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #003366;
            margin-bottom: 30px;
        }

        .certificate-title {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            margin-bottom: 10px;
        }

        .certificate-subtitle {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
        }

        .certificate-content {
            padding: 0 50px;
            text-align: center;
        }

        .certificate-body {
            margin: 40px 0;
        }

        .certificate-text {
            font-size: 18px;
            line-height: 1.6;
            color: #333;
            margin-bottom: 30px;
        }

        .user-name {
            font-size: 28px;
            font-weight: bold;
            color: #003366;
            margin: 20px 0;
            text-transform: uppercase;
        }

        .level-name {
            font-size: 24px;
            font-weight: bold;
            color: #006699;
            margin: 15px 0;
        }

        .certificate-details {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
            font-size: 16px;
            color: #555;
        }

        .certificate-code {
            font-weight: bold;
            color: #003366;
        }

        .certificate-date {
            font-style: italic;
        }

        .certificate-stats {
            margin-top: 30px;
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #f0f8ff;
            border-radius: 5px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }

        .stat-value {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
        }

        .certificate-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 14px;
            color: #666;
        }

        .signature-line {
            margin: 30px 0;
            height: 50px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .signature {
            text-align: center;
            width: 200px;
        }

        .signature-name {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            border-top: 1px solid #333;
            padding-top: 5px;
        }

        .signature-title {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-header">
            <div class="certificate-title">CERTIFICATE OF COMPLETION</div>
            <div class="certificate-subtitle">ABC Typing Academy</div>
        </div>

        <div class="certificate-content">
            <div class="certificate-body">
                <div class="certificate-text">
                    This certificate is proudly presented to
                </div>

                <div class="user-name">
                    {{ $user->name }}
                </div>

                <div class="certificate-text">
                    for successfully completing the
                </div>

                <div class="level-name">
                    {{ $level->name }} Level
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