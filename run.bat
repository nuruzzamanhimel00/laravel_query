for /l %%x in (1,1,10) do (
    start php artisan queue:work --stop-when-empty
)
