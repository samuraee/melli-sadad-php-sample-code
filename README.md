# نمونه کد PHP درگاه بانک ملی / سداد

PHP sample code for dealing with Melli/Sadad gateway compatible with banktest.ir mock services

- This component is compatible with PHP 5 and PHP 7+
- This component is compatible with [banktest.ir](http://banktest.ir) test gateways

## setup
for setup just update ```config.php``` file with your gateway infromation from SADAD or Banktest

```php
$key        = "YOUR_TERMINAL_KEY";  // TerminalKey
$MerchantId = "YOUR_MERCHANT_ID";   // MerchantId
$TerminalId = "YOUR_TERMINAL_ID";   // TerminalKey
```
if you want to deal with Banktest gateway change the following flat to true:

```php
$useBankTest = true; // برای تست با درگاه بانک تست این مقدار را true کنید
```


## support:
contact me on telegram: 
- [@banktest_support](https://telegram.me/banktest_support)
- [@a6oozar](https://telegram.me/a6oozar)
