### Trying to show how the jetbrains-junie integration on Github.com is capable of

### To run the PHP-CS-Fixer locally

dry-run
```bash
docker run --rm -v $(pwd):/app oskarstark/php-cs-fixer-ga --config=/app/.php-cs-fixer.dist.php --diff --dry-run /app/src
```

fix
```bash
docker run --rm -v $(pwd):/app oskarstark/php-cs-fixer-ga --config=/app/.php-cs-fixer.dist.php /app/src
```

### This application is based on the Symfony Demo application 
[Symfony Demo README](./SYMFONY_DEMO_README.MD)
