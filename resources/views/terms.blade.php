<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service · PandaQuizKids</title>
    
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
        
        <h1 class="page-title">Terms of Service</h1>
        
        <p><strong>Last updated: {{ date('F j, Y') }}</strong></p>
        
        <p>Please read these Terms of Service completely before using PandaQuizKids. This agreement documents the legally binding terms and conditions attached to the use of the platform at pandaquizkids.</p>
        
        <h2>1. Acceptance of Terms</h2>
        <p>By using or accessing PandaQuizKids in any way, viewing or browsing the Site, you are agreeing to be bound by these Terms of Service.</p>
        
        <h2>2. Use License</h2>
        <p>Permission is granted to temporarily download one copy of the materials on PandaQuizKids' website for personal, non-commercial transitory viewing only. This is the grant of a license, not a transfer of title, and under this license you may not:</p>
        <ul>
            <li>Modify or copy the materials.</li>
            <li>Use the materials for any commercial purpose or for any public display.</li>
            <li>Attempt to reverse engineer any software contained on PandaQuizKids' website.</li>
            <li>Remove any copyright or other proprietary notations from the materials.</li>
            <li>Transfer the materials to another person or "mirror" the materials on any other server.</li>
        </ul>
        <p>This license shall automatically terminate if you violate any of these restrictions and may be terminated by PandaQuizKids at any time.</p>
        
        <h2>3. Disclaimer</h2>
        <p>The materials on PandaQuizKids' website are provided on an 'as is' basis. PandaQuizKids makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties including, without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights.</p>
        
        <h2>4. Limitations</h2>
        <p>In no event shall PandaQuizKids or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption) arising out of the use or inability to use the materials on PandaQuizKids' website, even if PandaQuizKids or an authorized representative has been notified orally or in writing of the possibility of such damage.</p>
        
        <h2>5. Revisions and Errata</h2>
        <p>The materials appearing on PandaQuizKids' website could include technical, typographical, or photographic errors. PandaQuizKids does not warrant that any of the materials on its website are accurate, complete, or current. PandaQuizKids may make changes to the materials contained on its website at any time without notice.</p>
        
        <h2>6. Site Terms of Use Modifications</h2>
        <p>PandaQuizKids may revise these Terms of Service for its website at any time without notice. By using this website you are agreeing to be bound by the then current version of these Terms of Service.</p>
    </div>

</body>
</html>
