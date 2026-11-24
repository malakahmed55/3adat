# Knowledge Challenge Competitions (3adat)

A small PHP and MySQL website for running a knowledge competition with five sections: mathematics, programming, history, entrepreneurship and general information. Each section is a quiz that scores the answers and saves the result.

Status: school project for a local XAMPP setup. There is no live demo.

## Pages
- `home.php`: landing page.
- `form1.php`: registration (single or group). Passwords are saved as bcrypt hashes.
- `group.php`: team registration, up to five members.
- `Competitions.php`: section picker.
- `math1.php`, `programming.php`, `history.php`, `Entrepreneurship.php`, `information.php`: the quizzes.
- `config.php`: database settings and helpers shared by all pages.
- `schema.sql`: the tables the pages use.

## Run it locally
1. Install XAMPP and start Apache and MySQL.
2. Copy this folder into `htdocs/comp`.
3. On a fresh install only, import `schema.sql` in phpMyAdmin (it creates the `competitiondb` database). Do not import it over a database you already use; see the note on `schema.sql` below.
4. Open `http://localhost/comp/home.php`.

Database login defaults to `root` with no password (stock XAMPP). To change it, set `DB_HOST`, `DB_PORT`, `DB_USER`, `DB_PASS`, `DB_NAME` as environment variables, or create `config.local.php` next to `config.php` (it is git-ignored).

## Upgrading an existing database
Older versions saved passwords as plain text. Back up the `registrations` table, then run once:

    php tools/migrate_passwords.php

It widens the column to 255 characters and hashes every old password. This cannot be undone. Nothing in the site reads passwords back (there is no login page yet), so no other page is affected.

## Tests
`php tests/run.php` runs 36 checks against a fake database, so no MySQL is needed. They check that passwords are hashed, mismatched passwords are rejected, queries are prepared, names are escaped in the output, and no page has a hardcoded `localhost` link.

The whole site was also run on a throwaway test setup: PHP 8.3.9 with MariaDB 10.6.23, using real HTTP requests. That covered registration, team sign-up, the quizzes, redirects and the password migration (including running it twice).

Not tested: XAMPP on Windows, MySQL 8, other PHP versions, and any existing database that holds your own data.

## About `schema.sql`
`schema.sql` was rebuilt from the queries in the pages. It is not an export of an existing database. Use it only to create a fresh or test database. It is not an instruction to overwrite or change a database you already use: compare your own tables first.

## Known limits
- There is no login page and no admin area.
- Registration and password changes depend on your own tables matching the queries in the pages.

Built by Malak Ahmed.
