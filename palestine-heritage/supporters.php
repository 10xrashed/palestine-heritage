<?php
$pageTitle = "Our Supporters";
include 'includes/header.php';
?>

<link rel="stylesheet" href="assets/css/supporters.css">
    <section class="page-hero" style="background: linear-gradient(135deg, var(--color-green) 0%, var(--color-black) 100%);">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-badge">
                            <i class="fas fa-users"></i>
                            <span>Community</span>
                        </div>
                        <h1 class="hero-title">
                            <span class="title-line">Our Amazing</span>
                            <span class="title-line highlight">Supporters</span>
                        </h1>
                        <p class="hero-description">
                            Thank you to everyone who has contributed to preserving Palestinian heritage
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="thank-you-section" style="padding: 80px 0; background-color: var(--color-white);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="thank-you-letter" style="background: linear-gradient(135deg, rgba(0, 122, 61, 0.05), rgba(206, 17, 38, 0.05)); padding: 60px; border-radius: 20px; border-left: 5px solid var(--color-green);" data-aos="fade-up">
                        <div class="letter-header text-center mb-4">
                            <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 900 600'%3E%3Crect width='900' height='200' fill='%23000'/%3E%3Crect y='200' width='900' height='200' fill='%23fff'/%3E%3Crect y='400' width='900' height='200' fill='%23007A3D'/%3E%3Cpath d='M0 0 L450 300 L0 600 Z' fill='%23CE1126'/%3E%3C/svg%3E" alt="Palestine Flag" style="width: 80px; height: 80px; margin-bottom: 20px;">
                            <h2 style="color: var(--color-green); font-size: 2.5rem; font-weight: 700; margin-bottom: 10px;">Thank You</h2>
                            <p style="color: var(--color-gray-600); font-size: 1.1rem; font-style: italic;">From the Heart of Palestine</p>
                        </div>
                        
                        <div class="letter-content" style="font-size: 1.1rem; line-height: 1.8; color: var(--color-gray-700);">
                            <p style="margin-bottom: 20px;">Dear Valued Supporters,</p>
                            
                            <p style="margin-bottom: 20px;">
                                We extend our deepest gratitude to each of you who has stood with us in preserving and celebrating Palestinian heritage. Your unwavering support—whether through donations, volunteer work, or spreading awareness—has been instrumental in keeping our rich culture, history, and traditions alive for future generations.
                            </p>
                            
                            <p style="margin-bottom: 20px;">
                                Palestine's heritage is not just about the past; it is a living testament to the resilience, creativity, and enduring spirit of our people. Thanks to supporters like you, we can continue to document our stories, protect our historical sites, and share the beauty of Palestinian art, music, and traditions with the world.
                            </p>
                            
                            <p style="margin-bottom: 30px;">
                                Your contributions have enabled us to digitize ancient manuscripts, restore cultural landmarks, organize educational programs, and create platforms where Palestinian voices can be heard. Every dollar donated, every hour volunteered, and every message shared has made a tangible difference.
                            </p>
                            
                            <p style="font-weight: 600; color: var(--color-green); margin-bottom: 10px;">With heartfelt appreciation and solidarity,</p>
                            <p style="font-weight: 700; color: var(--color-black); font-size: 1.2rem;">The Palestine Heritage Team</p>
                            <p style="color: var(--color-red); font-style: italic; margin-top: 20px; padding-top: 20px; border-top: 2px solid var(--color-gray-200);">
                                🕊️ "In preserving our heritage, we preserve our identity, our dignity, and our hope for a free Palestine."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="supporters-section" style="padding: 80px 0; background-color: var(--color-gray-50);">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title" style="font-size: 2.5rem; font-weight: 700; color: var(--color-black); margin-bottom: 15px;">
                    Top 10 Supporters
                </h2>
                <p class="section-subtitle" style="font-size: 1.2rem; color: var(--color-gray-600);">
                    Honoring those who have made extraordinary contributions to our cause
                </p>
            </div>
            <div id="supportersContainer" class="supporters-grid">
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-success" role="status" style="width: 3rem; height: 3rem;">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-3 text-muted">Loading our top supporters...</p>
                </div>
            </div>
            <div class="text-center mt-5" data-aos="fade-up">
                <p style="font-size: 1.1rem; color: var(--color-gray-600); margin-bottom: 20px;">
                    Want to join our community of supporters?
                </p>
                <a href="support.php" class="btn btn-palestine-primary" style="padding: 15px 40px; font-size: 1.1rem;">
                    <i class="fas fa-heart"></i> Become a Supporter
                </a>
            </div>
        </div>
    </section>

<?php
$additionalScripts = <<<'SCRIPT'
<script>
async function loadSupporters() {
    try {
        console.log('[v0] Starting to load supporters...');
        console.log('[v0] Fetching from: api/get-supporters.php?limit=10');
        
        const response = await fetch('api/get-supporters.php?limit=10');
        console.log('[v0] Response status:', response.status);
        
        const result = await response.json();
        
        console.log('[v0] Top Supporters API response:', result);
        
        if (result.success) {
            console.log('[v0] Number of supporters:', result.data.supporters.length);
            displaySupporters(result.data.supporters);
        } else {
            console.error('[v0] API returned error:', result.message);
            document.getElementById('supportersContainer').innerHTML = `
                <div class="col-12">
                    <div class="alert alert-warning text-center" style="padding: 40px; border-radius: 15px;">
                        <i class="fas fa-exclamation-triangle fa-3x mb-3" style="color: #FFA500;"></i>
                        <h4 style="color: #856404; margin-bottom: 15px;">Database Not Set Up</h4>
                        <p style="color: #856404; font-size: 1.1rem;">${result.message}</p>
                        <a href="install.php" class="btn btn-warning mt-3" style="padding: 12px 30px; font-size: 1.1rem;">
                            <i class="fas fa-cog"></i> Run Database Setup
                        </a>
                    </div>
                </div>
            `;
        }
    } catch (error) {
        console.error('[v0] Error loading supporters:', error);
        document.getElementById('supportersContainer').innerHTML = `
            <div class="col-12">
                <div class="alert alert-danger text-center" style="padding: 40px; border-radius: 15px;">
                    <i class="fas fa-exclamation-circle fa-3x mb-3" style="color: #dc3545;"></i>
                    <h4 style="color: #721c24; margin-bottom: 15px;">Connection Error</h4>
                    <p style="color: #721c24; font-size: 1.1rem;">Failed to load supporters. ${error.message}</p>
                    <p style="color: #721c24; margin-top: 10px;">Please make sure:</p>
                    <ul style="list-style: none; padding: 0; color: #721c24;">
                        <li>✓ XAMPP is running (Apache & MySQL)</li>
                        <li>✓ Database is set up (run <a href="install.php">install.php</a>)</li>
                    </ul>
                </div>
            </div>
        `;
    }
}

function displaySupporters(supporters) {
    console.log('[v0] Displaying supporters:', supporters);
    const container = document.getElementById('supportersContainer');
    
    if (!supporters || supporters.length === 0) {
        console.log('[v0] No supporters found');
        container.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-users fa-4x text-muted mb-3"></i>
                <p class="text-muted">No supporters yet. Be the first one!</p>
                <a href="support.php" class="btn btn-palestine-primary mt-3">Support Now</a>
            </div>
        `;
        return;
    }
    
    const html = supporters.map((supporter, index) => {
        const rank = index + 1;
        let rankBadge = '';
        let borderColor = 'transparent';
        
        if (rank === 1) {
            rankBadge = '<div style="position: absolute; top: -10px; right: -10px; background: linear-gradient(135deg, #FFD700, #FFA500); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4); z-index: 10;">🥇</div>';
            borderColor = '#FFD700';
        } else if (rank === 2) {
            rankBadge = '<div style="position: absolute; top: -10px; right: -10px; background: linear-gradient(135deg, #C0C0C0, #A8A8A8); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; box-shadow: 0 4px 12px rgba(192, 192, 192, 0.4); z-index: 10;">🥈</div>';
            borderColor = '#C0C0C0';
        } else if (rank === 3) {
            rankBadge = '<div style="position: absolute; top: -10px; right: -10px; background: linear-gradient(135deg, #CD7F32, #B87333); color: white; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 1.2rem; box-shadow: 0 4px 12px rgba(205, 127, 50, 0.4); z-index: 10;">🥉</div>';
            borderColor = '#CD7F32';
        }
        
        return `
        <div class="supporter-card" data-aos="fade-up" data-aos-delay="${index * 50}" style="position: relative; background: white; border-radius: 15px; padding: 30px; box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08); transition: all 0.3s ease; border: 2px solid ${borderColor};">
            ${rankBadge}
            <div class="supporter-header" style="display: flex; align-items: center; margin-bottom: 20px; gap: 15px;">
                <div class="supporter-rank" style="font-size: 2rem; font-weight: 700; color: #007A3D; min-width: 50px;">
                    #${rank}
                </div>
                <div class="supporter-avatar" style="width: 60px; height: 60px; border-radius: 50%; background: linear-gradient(135deg, #007A3D, #000); display: flex; align-items: center; justify-content: center; color: white; font-size: 1.5rem; flex-shrink: 0;">
                    <i class="fas fa-user"></i>
                </div>
                <div class="supporter-info" style="flex: 1;">
                    <h5 class="supporter-name" style="font-size: 1.2rem; font-weight: 700; color: #000; margin-bottom: 5px;">${supporter.name}</h5>
                    <p class="supporter-meta" style="color: #666; font-size: 0.95rem; margin: 0;">
                        <i class="fas fa-map-marker-alt"></i> ${supporter.country}
                        ${supporter.amount ? ` • <span style="color: #007A3D; font-weight: 600;">${supporter.formatted_amount}</span>` : ''}
                    </p>
                </div>
                <div class="supporter-badge" style="width: 45px; height: 45px; border-radius: 50%; background: rgba(0, 122, 61, 0.1); display: flex; align-items: center; justify-content: center; color: #007A3D; font-size: 1.2rem;">
                    <i class="fas fa-${getSupportIcon(supporter.support_type)}"></i>
                </div>
            </div>
            ${supporter.message ? `
            <div class="supporter-message" style="background: rgba(0, 122, 61, 0.05); padding: 15px 20px; border-radius: 10px; margin: 20px 0; border-left: 3px solid #007A3D;">
                <p style="margin: 0; color: #333; font-style: italic; line-height: 1.6;">"${supporter.message}"</p>
            </div>
            ` : ''}
            <div class="supporter-footer" style="display: flex; justify-content: space-between; align-items: center; padding-top: 15px; border-top: 1px solid #ddd; margin-top: 15px;">
                <span class="supporter-time" style="color: #999; font-size: 0.9rem;"><i class="fas fa-clock"></i> ${supporter.time_ago}</span>
                <span class="supporter-type" style="background: #007A3D; color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600;">${formatSupportType(supporter.support_type)}</span>
            </div>
        </div>
    `}).join('');
    
    console.log('[v0] Generated HTML for', supporters.length, 'supporters');
    console.log('[v0] Setting innerHTML...');
    container.innerHTML = html;
    console.log('[v0] Cards should now be visible');
}

// Helper functions
function getSupportIcon(type) {
    const icons = {
        'donation': 'dollar-sign',
        'volunteer': 'hands-helping',
        'awareness': 'bullhorn',
        'advocacy': 'gavel',
        'other': 'heart'
    };
    return icons[type] || 'heart';
}

function formatSupportType(type) {
    return type.charAt(0).toUpperCase() + type.slice(1);
}

document.addEventListener('DOMContentLoaded', () => loadSupporters());
</script>
SCRIPT;

include 'includes/footer.php';
?>
