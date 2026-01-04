<?php
$pageTitle = "Gallery";
include 'includes/header.php';
?>
    <section class="page-hero gallery-hero">
        <div class="hero-background">
            <div class="hero-overlay"></div>
        </div>
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-lg-8 mx-auto text-center">
                    <div class="hero-content" data-aos="fade-up">
                        <div class="hero-badge">
                            <i class="fas fa-camera"></i>
                            <span>Visual Journey</span>
                        </div>
                        <h1 class="hero-title">
                            <span class="title-line">Palestine</span>
                            <span class="title-line highlight">Gallery</span>
                        </h1>
                        <p class="hero-description">
                            Explore the beauty, culture, and spirit of Palestine through images
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="gallery-filters">
        <div class="container">
            <div class="filter-tabs">
                <button class="filter-btn active" data-filter="all">
                    <i class="fas fa-th"></i>
                    <span>All</span>
                </button>
                <button class="filter-btn" data-filter="landscape">
                    <i class="fas fa-mountain"></i>
                    <span>Landscapes</span>
                </button>
                <button class="filter-btn" data-filter="culture">
                    <i class="fas fa-users"></i>
                    <span>Culture</span>
                </button>
                <button class="filter-btn" data-filter="architecture">
                    <i class="fas fa-building"></i>
                    <span>Architecture</span>
                </button>
                <button class="filter-btn" data-filter="people">
                    <i class="fas fa-user-friends"></i>
                    <span>People</span>
                </button>
            </div>
        </div>
    </section>
    <section class="gallery-grid-section">
        <div class="container">
            <div class="gallery-masonry">
                <div class="gallery-item" data-category="landscape">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/eb/d0/34/ebd0344db5d72d1d077b25d7102072e1.jpg" alt="Palestinian Landscape">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Palestinian Countryside</h4>
                                <p>Beautiful landscapes of historic Palestine</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/eb/d0/34/ebd0344db5d72d1d077b25d7102072e1.jpg" data-title="Palestinian Countryside" data-description="Beautiful landscapes of historic Palestine">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="culture">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/74/86/a7/7486a70b4b62e3a745580d9c0bea6369.jpg" alt="Palestinian Culture">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Traditional Culture</h4>
                                <p>Rich cultural heritage and traditions</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/74/86/a7/7486a70b4b62e3a745580d9c0bea6369.jpg" data-title="Traditional Culture" data-description="Rich cultural heritage and traditions">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="architecture">
                    <div class="gallery-card">
                        <img src="https://www.thakertwatan.com/assets/img/portfolio/kan1.jpg" alt="Palestinian Architecture">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Historic Architecture</h4>
                                <p>Ancient buildings and monuments</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://www.thakertwatan.com/assets/img/portfolio/kan1.jpg" data-title="Historic Architecture" data-description="Ancient buildings and monuments">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="people">
                    <div class="gallery-card">
                        <img src="https://www.thakertwatan.com/assets/img/portfolio/14.jpg" alt="Palestinian People">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Palestinian People</h4>
                                <p>The heart and soul of Palestine</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://www.thakertwatan.com/assets/img/portfolio/14.jpg" data-title="Palestinian People" data-description="The heart and soul of Palestine">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="landscape">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/dd/4a/3c/dd4a3ca2c40ed085c3b7c2d0cfcbc785.jpg" alt="Jerusalem">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Jerusalem</h4>
                                <p>The eternal capital of Palestine</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/dd/4a/3c/dd4a3ca2c40ed085c3b7c2d0cfcbc785.jpg" data-title="Jerusalem" data-description="The eternal capital of Palestine">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="culture">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/474x/13/1a/ef/131aef2ec1e7250045e2a7fc3e587ea5.jpg" alt="Palestinian Art">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Traditional Art</h4>
                                <p>Handcrafted Palestinian artwork</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/474x/13/1a/ef/131aef2ec1e7250045e2a7fc3e587ea5.jpg" data-title="Traditional Art" data-description="Handcrafted Palestinian artwork">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="architecture">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/00/69/a9/0069a9fb8df26f8bbd1e2d57582efb2a.jpg" alt="Gaza Architecture">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Gaza Architecture</h4>
                                <p>Historic buildings in Gaza</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/00/69/a9/0069a9fb8df26f8bbd1e2d57582efb2a.jpg" data-title="Gaza Architecture" data-description="Historic buildings in Gaza">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="people">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/f4/3a/2c/f43a2ca23b8250cd3c18e96732dc8245.jpg" alt="Palestinian Children">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Future Generation</h4>
                                <p>Palestinian children and youth</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/f4/3a/2c/f43a2ca23b8250cd3c18e96732dc8245.jpg" data-title="Future Generation" data-description="Palestinian children and youth">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="landscape">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/26/03/f4/2603f423f4953168189856afab0c888f.jpg" alt="Palestinian Village">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Village Life</h4>
                                <p>Traditional Palestinian villages</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/26/03/f4/2603f423f4953168189856afab0c888f.jpg" data-title="Village Life" data-description="Traditional Palestinian villages">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="culture">
                    <div class="gallery-card">
                        <img src="https://i.pinimg.com/736x/0a/e4/3b/0ae43b5bcee497de89988095da9fc513.jpg" alt="Palestinian Heritage">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h4>Cultural Heritage</h4>
                                <p>Preserving Palestinian traditions</p>
                            </div>
                            <div class="gallery-actions">
                                <button class="gallery-btn" data-bs-toggle="modal" data-bs-target="#imageModal" data-image="https://i.pinimg.com/736x/0a/e4/3b/0ae43b5bcee497de89988095da9fc513.jpg" data-title="Cultural Heritage" data-description="Preserving Palestinian traditions">
                                    <i class="fas fa-expand"></i>
                                </button>
                                <button class="gallery-btn like-btn">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-5">
                <button class="btn btn-palestine-primary" id="loadMore">
                    <span>Load More Images</span>
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </section>
    <div class="modal fade" id="imageModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Image Gallery</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="modal-image-container">
                        <img id="modalImage" src="/placeholder.svg" alt="" class="img-fluid">
                        <div class="modal-image-info">
                            <h4 id="modalImageTitle">Image Title</h4>
                            <p id="modalImageDescription">Image description</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
include 'includes/footer.php';
?>
