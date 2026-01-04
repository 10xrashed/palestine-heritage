<?php
$pageTitle = "Gaza Crisis";
include 'includes/header.php';
?>
    <section class="page-hero gaza-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-badge">
                            <i class="fas fa-exclamation-triangle"></i>
                            <span>Crisis Information</span>
                        </div>
                        <h1 class="hero-title">
                            <span class="title-line">Gaza</span>
                            <span class="title-line highlight">Crisis</span>
                        </h1>
                        <p class="hero-description">
                            Current situation and humanitarian crisis information for Gaza Strip
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="emergency-alert" data-aos="fade-down">
        <div class="container">
            <div class="alert-content" style="display: flex; align-items: center; gap: 2rem; background: #fff3cd; padding: 2rem; border-radius: 15px; border-left: 5px solid var(--color-red);">
                <div class="alert-icon" style="font-size: 3rem; color: var(--color-red);">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="alert-text" style="flex: 1;">
                    <h3 style="margin-bottom: 0.5rem; color: var(--color-gray-800);">Humanitarian Crisis in Gaza</h3>
                    <p style="margin: 0; color: var(--color-gray-600);">Immediate aid needed for civilians affected by the ongoing crisis</p>
                </div>
                <div class="alert-action">
                    <a href="support.php" class="btn btn-palestine-white">
                        <span>Help Now</span>
                        <i class="fas fa-heart"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="statistics-section" style="padding: 80px 0; background-color: var(--color-gray-50);">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge red">Current Situation</span>
                <h2 class="section-title">Crisis <span class="text-black">Statistics</span></h2>
            </div>
            
            <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <div class="stat-card critical" style="background: linear-gradient(135deg, #ff6b6b, #ee5a6f); color: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); text-align: center;" data-aos="zoom-in" data-aos-delay="100">
                    <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem;">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">2.2M+</div>
                        <div class="stat-label" style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">People Affected</div>
                        <div class="stat-description" style="font-size: 0.875rem; opacity: 0.9;">Total population impacted by the crisis</div>
                    </div>
                </div>
                
                <div class="stat-card urgent" style="background: linear-gradient(135deg, #f59e0b, #d97706); color: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); text-align: center;" data-aos="zoom-in" data-aos-delay="200">
                    <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem;">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">1M+</div>
                        <div class="stat-label" style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Children at Risk</div>
                        <div class="stat-description" style="font-size: 0.875rem; opacity: 0.9;">Children requiring immediate assistance</div>
                    </div>
                </div>
                
                <div class="stat-card severe" style="background: linear-gradient(135deg, #8b5cf6, #7c3aed); color: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); text-align: center;" data-aos="zoom-in" data-aos-delay="300">
                    <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem;">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">500K+</div>
                        <div class="stat-label" style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Displaced Families</div>
                        <div class="stat-description" style="font-size: 0.875rem; opacity: 0.9;">Families forced to leave their homes</div>
                    </div>
                </div>
                
                <div class="stat-card critical" style="background: linear-gradient(135deg, #ef4444, #dc2626); color: white; padding: 2.5rem; border-radius: 20px; box-shadow: 0 10px 40px rgba(0,0,0,0.1); text-align: center;" data-aos="zoom-in" data-aos-delay="400">
                    <div class="stat-icon" style="font-size: 3rem; margin-bottom: 1rem;">
                        <i class="fas fa-hospital"></i>
                    </div>
                    <div class="stat-content">
                        <div class="stat-number" style="font-size: 2.5rem; font-weight: 700; margin-bottom: 0.5rem;">100K+</div>
                        <div class="stat-label" style="font-size: 1.125rem; font-weight: 600; margin-bottom: 0.5rem;">Medical Cases</div>
                        <div class="stat-description" style="font-size: 0.875rem; opacity: 0.9;">People requiring medical attention</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="affected-areas" style="padding: 80px 0; background-color: white;">
        <div class="container">
            <div class="section-header text-center" data-aos="fade-up">
                <span class="section-badge black">Affected Regions</span>
                <h2 class="section-title">Gaza <span class="text-red">Districts</span></h2>
            </div>
            
            <div class="areas-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 2rem; margin-top: 3rem;">
                <div class="area-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s;" data-aos="fade-up" data-aos-delay="100">
                    <div class="area-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="https://i.pinimg.com/736x/74/20/35/74203501e523c7640b34e2617913b8a5.jpg" alt="Rafah" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="area-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.7)); padding: 1.5rem; display: flex; align-items: flex-end;">
                            <div class="severity-badge critical" style="background-color: var(--color-red); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600;">Critical</div>
                        </div>
                    </div>
                    <div class="area-content" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--color-gray-800);">Rafah</h3>
                        <p class="area-description" style="color: var(--color-gray-600); line-height: 1.6; margin-bottom: 1.5rem;">
                            Southern Gaza district serving as a crucial crossing point with Egypt, 
                            now housing thousands of displaced families.
                        </p>
                        <div class="area-stats" style="display: flex; flex-wrap: wrap; gap: 1rem;">
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-gray-600);">
                                <i class="fas fa-users"></i>
                                <span>300K+ displaced</span>
                            </div>
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-red);">
                                <i class="fas fa-exclamation-triangle"></i>
                                <span>Critical situation</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="area-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s;" data-aos="fade-up" data-aos-delay="200">
                    <div class="area-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="https://www.aljazeera.com/wp-content/uploads/2023/12/AA-20231202-33083970-33083968-ISRAELI_ATTACKS_CONTINUE_IN_GAZA-1701518182.jpg?fit=1170%2C832&quality=80" alt="Deir al-Balah" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="area-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.7)); padding: 1.5rem; display: flex; align-items: flex-end;">
                            <div class="severity-badge severe" style="background-color: #f59e0b; color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600;">Severe</div>
                        </div>
                    </div>
                    <div class="area-content" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--color-gray-800);">Deir al-Balah</h3>
                        <p class="area-description" style="color: var(--color-gray-600); line-height: 1.6; margin-bottom: 1.5rem;">
                            Central Gaza district struggling to accommodate displaced populations 
                            with limited infrastructure and resources.
                        </p>
                        <div class="area-stats" style="display: flex; flex-wrap: wrap; gap: 1rem;">
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-gray-600);">
                                <i class="fas fa-users"></i>
                                <span>200K+ displaced</span>
                            </div>
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-red);">
                                <i class="fas fa-hospital"></i>
                                <span>Medical shortage</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="area-card" style="background: white; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.1); transition: transform 0.3s;" data-aos="fade-up" data-aos-delay="300">
                    <div class="area-image" style="position: relative; height: 250px; overflow: hidden;">
                        <img src="https://www.aljazeera.com/wp-content/uploads/2023/10/5Q8B0785-copy-1697625199.jpg?fit=1170%2C780&quality=80" alt="Khan Younis" style="width: 100%; height: 100%; object-fit: cover;">
                        <div class="area-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, transparent, rgba(0,0,0,0.7)); padding: 1.5rem; display: flex; align-items: flex-end;">
                            <div class="severity-badge critical" style="background-color: var(--color-red); color: white; padding: 0.5rem 1rem; border-radius: 20px; font-weight: 600;">Critical</div>
                        </div>
                    </div>
                    <div class="area-content" style="padding: 2rem;">
                        <h3 style="font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; color: var(--color-gray-800);">Khan Younis</h3>
                        <p class="area-description" style="color: var(--color-gray-600); line-height: 1.6; margin-bottom: 1.5rem;">
                            Major southern city with overwhelmed healthcare facilities and 
                            critical shortages of basic necessities.
                        </p>
                        <div class="area-stats" style="display: flex; flex-wrap: wrap; gap: 1rem;">
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-gray-600);">
                                <i class="fas fa-users"></i>
                                <span>400K+ affected</span>
                            </div>
                            <div class="area-stat" style="display: flex; align-items: center; gap: 0.5rem; color: var(--color-red);">
                                <i class="fas fa-medkit"></i>
                                <span>Medical crisis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="cta-section gaza-cta" style="padding: 80px 0; background: linear-gradient(135deg, var(--color-red) 0%, var(--color-black) 100%); color: white;" data-aos="fade-up">
        <div class="container">
            <div class="cta-content">
                <div class="row align-items-center text-center">
                    <div class="col-12">
                        <h2 class="cta-title" style="font-size: clamp(2rem, 5vw, 3rem); font-weight: 700; margin-bottom: 1.5rem;">Help Gaza Now</h2>
                        <p class="cta-description" style="font-size: 1.25rem; margin-bottom: 2.5rem; max-width: 700px; margin-left: auto; margin-right: auto; opacity: 0.9;">
                            Every contribution makes a difference. Join us in providing immediate relief 
                            and long-term support for the people of Gaza.
                        </p>
                        <div class="cta-actions" style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                            <a href="support.php" class="btn btn-palestine-white btn-lg">
                                <span>Donate Now</span>
                                <i class="fas fa-heart"></i>
                            </a>
                            <a href="index.php" class="btn btn-palestine-outline-white btn-lg">
                                <i class="fas fa-arrow-left"></i>
                                <span>Back to Home</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
include 'includes/footer.php';
?>
