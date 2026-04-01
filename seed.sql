-- Seed: usuario administrador por defecto
-- Email: admin@shoestore.com  |  Password: Admin123
INSERT INTO users (id, name, email, password, role, status, created_at, updated_at)
VALUES (
    'a0000000-0000-0000-0000-000000000001',
    'Administrator',
    'admin@shoestore.com',
    '$2y$12$mKTNpKhXTVTOZLwKbp63e.Wbbco677OKM4DwSteHuxGZ.EGrCK0Gke',
    'ADMIN',
    'ACTIVE',
    NOW(),
    NOW()
);
