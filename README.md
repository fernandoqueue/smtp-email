# SMTP-EMAIL

SMTP-Email is a simple script to help you send an email using an smtp service such as SendGrid or Mailgun. It includes a page where you can customize the html page you send (EmailView.php). 

## Installation

install dependencies using composer

```bash
composer install
```

## Usage
Send your form data to ```Send.php``` with input names ```name, email, and message```

When customizing the html the data will be in ```$data``` variable
For example
```php
$data['name']
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](https://choosealicense.com/licenses/mit/)
