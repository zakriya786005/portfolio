# TODO - Full-Stack Portfolio (M. ZAKRIYA)

## Plan Approved
- Create full PHP+MySQL connected portfolio with auth, dashboard CRUD, and contact messages.

## Steps
1. Create project structure (root pages, includes/, auth/, assets/, database/).
2. Add MySQL schema + seed file: `database/portfolio.sql`.
3. Implement DB connection: `includes/db.php` (PDO + prepared statements).
4. Implement shared UI: `includes/header.php`, `includes/navbar.php`, `includes/footer.php`.
5. Implement front-end styling + JS interactivity:
   - `assets/css/style.css`
   - `assets/js/script.js`
6. Implement auth pages:
   - `signup.php`, `login.php`, `auth/signup_process.php`, `auth/login_process.php`, `auth/logout.php`
7. Implement dashboard (session-protected): `dashboard.php`
   - Add project form
   - View messages
   - Logout
8. Implement dynamic projects listing: `projects.php` (reads from DB)
9. Implement contact form and storage: `contact.php` + message insert logic.
10. Quick smoke test checklist (manual):
   - DB import works
   - Signup/login redirects
   - Dashboard access protected
   - Add project persists and appears on projects page
   - Contact messages persist

