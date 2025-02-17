## Overview

A backend server with an API for customers run in Laravel 11

A frontend web app that fetching data from the API and displays it in a table

## Getting Started

First, clone the respository and install dependencies:

```bash
clone https://github.com/griessel-jc/catch-design-test-apps
cd catch-design-test-apps
```

Setup MySQL docker container, it will map the port to 3307 by default to avoid conflict with local SQL.

```bash
cd catchdesign-api
docker compose -f compose.dev.yml up -d
```

Install dependancies for Laravel and host server
```bash
composer install
php artisan serve
```

Open [http://localhost:3000](http://localhost:3000) with your browser to see the result.

You can start editing the page by modifying `app/page.tsx`. The page auto-updates as you edit the file.

This project uses [`next/font`](https://nextjs.org/docs/app/building-your-application/optimizing/fonts) to automatically optimize and load [Geist](https://vercel.com/font), a new font family for Vercel.

## Learn More

To learn more about Next.js, take a look at the following resources:

- [Next.js Documentation](https://nextjs.org/docs) - learn about Next.js features and API.
- [Learn Next.js](https://nextjs.org/learn) - an interactive Next.js tutorial.

You can check out [the Next.js GitHub repository](https://github.com/vercel/next.js) - your feedback and contributions are welcome!

## Deploy on Vercel

The easiest way to deploy your Next.js app is to use the [Vercel Platform](https://vercel.com/new?utm_medium=default-template&filter=next.js&utm_source=create-next-app&utm_campaign=create-next-app-readme) from the creators of Next.js.

Check out our [Next.js deployment documentation](https://nextjs.org/docs/app/building-your-application/deploying) for more details.
