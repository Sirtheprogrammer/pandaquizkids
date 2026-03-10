<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy · PandaQuizKids</title>
    
    <!-- Fonts & icons -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: #F5F5F5;
            color: #333333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }

        /* ── Header ── */
        .pqk-header {
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #FF1F66 0%, #E91E8C 100%);
            padding: 1.5rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(255,31,102,0.3);
            text-decoration: none;
            color: white;
            margin-bottom: 2rem;
        }

        .pqk-brand {
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .pqk-brand-icon {
            background-color: #FFFFFF;
            color: #FF1F66;
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: 700;
            box-shadow: 0 4px 0 #C41551;
        }

        .pqk-brand h1 {
            font-size: 1.8rem;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        /* ── Content ── */
        .page-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
            background: #FFFFFF;
            border-radius: 20px;
            box-shadow: 0 8px 0 rgba(0,0,0,0.05), 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 3rem;
        }

        .page-title {
            color: #FF1F66;
            font-size: 2.2rem;
            margin-bottom: 1.5rem;
            border-bottom: 3px solid #FFD700;
            padding-bottom: 0.5rem;
            display: inline-block;
        }

        h2 {
            color: #9B59B6;
            margin-top: 2rem;
            font-size: 1.5rem;
        }

        p {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 1rem;
        }

        ul {
            font-size: 1.1rem;
            color: #555;
            margin-left: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: #FFD700;
            color: #FF1F66;
            padding: 0.8rem 1.5rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 700;
            border: 3px solid #FFFFFF;
            box-shadow: 0 4px 0 #FFC700;
            transition: 0.1s;
            margin-bottom: 2rem;
        }

        .back-link:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #FFC700;
        }

        @media (max-width: 600px) {
            .page-container {
                margin: 0 1rem 2rem;
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <a href="{{ url('/') }}" class="pqk-header">
        <div class="pqk-brand">
            <div class="pqk-brand-icon">P</div>
            <h1>Panda Quiz</h1>
        </div>
    </a>

    <div class="page-container">
        <a href="{{ url('/') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Games</a>
        
        <h1 class="page-title">Privacy Policy</h1>
        
        <p><strong>Last updated: {{ date('F j, Y') }}</strong></p>
        
        <p>Welcome to PandaQuizKids. Your privacy and the safety of our younger users are very important to us. This Privacy Policy outlines what information we collect, how it is used, and the measures we take to protect it.</p>
        
        <h2>1. Information Collection</h2>
        <p>PandaQuizKids is designed to be safe for children. We DO NOT require users or children to register an account, provide names, email addresses, or any personally identifiable information (PII) to play our games.</p>
        
        <h2>2. Usage Data & Analytics</h2>
        <p>To improve our games, we may collect anonymous, non-personal analytical data such as:</p>
        <ul>
            <li>Game completion times and scores (stored locally on your device).</li>
            <li>General, non-specific device information (e.g., browser type, screen resolution).</li>
            <li>Aggregated, anonymous interaction data (e.g., which buttons are pressed most often).</li>
        </ul>
        <p>This data cannot be linked back to any specific individual.</p>
        
        <h2>3. Local Storage (Cookies)</h2>
        <p>We use standard local storage (similar to cookies) strictly to save game progress, user settings (like Light/Dark mode), and high scores on your own device. We do not use cookies for tracking or advertising profiles.</p>
        
        <h2>4. Third-Party Advertising</h2>
        <p>Our website utilizes third-party advertising networks (such as Google AdSense) to display ads. These networks may use cookies to serve ads based on a user's prior visits to this website or other websites on the Internet.</p>
        <p>We take care to ensure that ads displayed on our platform are family-friendly, but we have limited control over the specific ads served by these networks. Please refer to the privacy policies of these third-party services for more information.</p>
        
        <h2>5. Links to Other Sites</h2>
        <p>PandaQuizKids may contain links to other websites. We do not control these sites and are not responsible for their content or privacy practices.</p>
        
        <h2>6. Changes to this Policy</h2>
        <p>We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>

        <h2>7. Contact Us</h2>
        <p>If you have any questions or concerns about this Privacy Policy, please contact us.</p>
    </div>

</body>
</html>
