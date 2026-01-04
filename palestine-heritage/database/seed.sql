USE palestine_heritage;
TRUNCATE TABLE supporters;
TRUNCATE TABLE newsletter_subscribers;
INSERT INTO supporters (full_name, email, country, support_type, amount, message, is_anonymous, status) VALUES
('Ahmed Hassan', 'ahmed.hassan@example.com', 'Palestine', 'donation', 100.00, 'Supporting my beloved homeland', FALSE, 'completed'),
('Sarah Johnson', 'sarah.j@example.com', 'United States', 'donation', 250.00, 'Standing with Palestine', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous1@example.com', 'United Kingdom', 'donation', 500.00, 'For the children of Gaza', TRUE, 'completed'),
('Omar Al-Masri', 'omar.masri@example.com', 'Jordan', 'donation', 75.00, 'From Jordan with love', FALSE, 'completed'),
('Maria Garcia', 'maria.garcia@example.com', 'Spain', 'awareness', NULL, 'Spreading awareness through social media', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous2@example.com', 'Canada', 'donation', 300.00, 'Peace for Palestine', TRUE, 'completed'),
('Fatima Al-Zahra', 'fatima.zahra@example.com', 'Egypt', 'donation', 150.00, 'May Allah protect Palestine', FALSE, 'completed'),
('John Smith', 'john.smith@example.com', 'Australia', 'volunteer', NULL, 'I want to help preserve Palestinian culture', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous3@example.com', 'Germany', 'donation', 200.00, 'Justice for Palestine', TRUE, 'completed'),
('Layla Mahmoud', 'layla.mahmoud@example.com', 'Lebanon', 'donation', 125.00, 'Our hearts are with you', FALSE, 'completed'),
('David Chen', 'david.chen@example.com', 'Malaysia', 'donation', 180.00, 'Supporting Palestinian rights', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous4@example.com', 'France', 'donation', 400.00, 'Free Palestine', TRUE, 'completed'),
('Noor Abdullah', 'noor.abdullah@example.com', 'Saudi Arabia', 'donation', 350.00, 'May Palestine be free', FALSE, 'completed'),
('Emma Wilson', 'emma.wilson@example.com', 'Ireland', 'advocacy', NULL, 'Advocating for Palestinian rights in EU', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous5@example.com', 'Sweden', 'donation', 275.00, 'Solidarity with Palestine', TRUE, 'completed'),
('Hassan Khalil', 'hassan.khalil@example.com', 'Kuwait', 'donation', 225.00, 'Support from Kuwait', FALSE, 'completed'),
('Sophie Martin', 'sophie.martin@example.com', 'Belgium', 'awareness', NULL, 'Organizing awareness campaigns', FALSE, 'completed'),
('Anonymous Supporter', 'anonymous6@example.com', 'Norway', 'donation', 450.00, 'For Palestinian children', TRUE, 'completed'),
('Yusuf Ibrahim', 'yusuf.ibrahim@example.com', 'Qatar', 'donation', 600.00, 'From Qatar with prayers', FALSE, 'completed'),
('Lisa Anderson', 'lisa.anderson@example.com', 'New Zealand', 'volunteer', NULL, 'Ready to support education initiatives', FALSE, 'completed');
INSERT INTO newsletter_subscribers (email, is_active) VALUES
('subscriber1@example.com', TRUE),
('subscriber2@example.com', TRUE),
('subscriber3@example.com', TRUE),
('subscriber4@example.com', TRUE),
('subscriber5@example.com', TRUE);
SELECT 'Database seeded successfully!' as Message;
SELECT COUNT(*) as 'Total Supporters' FROM supporters;
SELECT COUNT(*) as 'Total Newsletter Subscribers' FROM newsletter_subscribers;
