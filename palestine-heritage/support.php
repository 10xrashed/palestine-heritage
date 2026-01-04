<?php
$pageTitle = "Support Palestine";
include 'includes/header.php';
$flashMessage = getFlashMessage();
?>
    <section class="page-hero support-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-badge">
                            <i class="fas fa-heart"></i>
                            <span>Make a Difference</span>
                        </div>
                        <h1 class="hero-title">
                            <span class="title-line">Support</span>
                            <span class="title-line highlight">Palestine</span>
                        </h1>
                        <p class="hero-description">
                            Your support helps preserve Palestinian heritage and provides aid to those in need
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="support-form-section" style="padding: 80px 0; background-color: var(--color-gray-50);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="support-form-card" style="background: white; padding: 3rem; border-radius: 20px; box-shadow: 0 20px 60px rgba(0,0,0,0.1);" data-aos="fade-up">
                        <div class="text-center mb-4">
                            <h2 class="section-title mb-3">Submit Your Support</h2>
                            <p class="section-description">Fill out the form below to contribute to our cause</p>
                        </div>
                        
                        <form id="supportForm" method="POST">
                            <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="full_name" class="form-label">Full Name *</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">Country *</label>
                                    <input type="text" class="form-control" id="country" name="country" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="support_type" class="form-label">Support Type *</label>
                                <select class="form-select" id="support_type" name="support_type" required>
                                    <option value="">Select support type...</option>
                                    <option value="donation">Monetary Donation</option>
                                    <option value="volunteer">Volunteer</option>
                                    <option value="awareness">Spread Awareness</option>
                                    <option value="advocacy">Advocacy</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            
                            <div class="mb-3" id="amountField" style="display: none;">
                                <label for="amount" class="form-label">Donation Amount (USD) *</label>
                                <div class="input-group">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="amount" name="amount" min="1" step="0.01">
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message (Optional)</label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Share why you're supporting Palestine..."></textarea>
                            </div>
                            
                            <div class="form-check mb-4">
                                <input class="form-check-input" type="checkbox" id="is_anonymous" name="is_anonymous">
                                <label class="form-check-label" for="is_anonymous">
                                    Make my support anonymous
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-palestine-primary w-100 btn-lg">
                                <i class="fas fa-paper-plane"></i>
                                <span>Submit Support</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
$additionalScripts = <<<'SCRIPT'
<script>
// Show/hide donation amount field based on support type
document.getElementById('support_type').addEventListener('change', function() {
    const amountField = document.getElementById('amountField');
    const amountInput = document.getElementById('amount');
    
    if (this.value === 'donation') {
        amountField.style.display = 'block';
        amountInput.required = true;
    } else {
        amountField.style.display = 'none';
        amountInput.required = false;
        amountInput.value = '';
    }
});

// Handle form submission
document.getElementById('supportForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    
    // Disable button and show loading
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> <span>Processing...</span>';
    
    try {
        const response = await fetch('api/submit-support.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            showToast(result.message, 'success');
            this.reset();
            
            // Redirect to supporters page after 2 seconds
            setTimeout(() => {
                window.location.href = 'supporters.php';
            }, 2000);
        } else {
            showToast(result.message, 'error');
        }
    } catch (error) {
        showToast('An error occurred. Please try again.', 'error');
    } finally {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
    }
});
</script>
SCRIPT;

include 'includes/footer.php';
?>
