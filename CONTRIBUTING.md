# Contributing
We love your input! We want to make contributing to this project as easy and transparent as possible, whether it's:

- Reporting a bug
- Discussing the current state of the code
- Submitting a fix
- Proposing new features
- Becoming a maintainer

## Our Development Process
We use GitHub to host code, to track issues and feature requests, as well as accept pull requests.

## Code of Conduct
The code of conduct is described in [`CODE_OF_CONDUCT.md`](CODE_OF_CONDUCT.md).

## Pull Requests
We actively welcome your pull requests.
We use [GitHub Flow](https://guides.github.com/introduction/flow/index.html) and Pull Requests.

1. Fork the repo and create your branch from `master`.
2. If you've added code that should be tested, add tests.
3. If you've changed APIs, update the documentation.
4. Ensure the test suite passes.
5. Make sure your code lints.
6. Issue that pull request!

## Issues
We use GitHub issues to track public bugs. Please ensure your description is
clear and has sufficient instructions to be able to reproduce the issue.
If possible please provide a minimal demo of the problem.

## Security vulnerability disclosure
Please report suspected security vulnerabilities in private to social.zibios@gmail.com, 
Please do NOT create publicly viewable issues for suspected security vulnerabilities.

## Tests

We're using [`phpunit/phpunit`](https://github.com/sebastianbergmann/phpunit) 
to drive the development. Run

```
$ vendor/bin/phpunit
```

to run all the tests.

## Coding Standards

We use PSR2 and Symfony as our Coding Standards.
We are using [`friendsofphp/php-cs-fixer`](https://github.com/FriendsOfPHP/PHP-CS-Fixer) 
to enforce coding standards. Check [`.php_cs.dist`](.php_cs.dist) for details.

## License
By contributing to this project, you agree that your contributions will be licensed under the 
license from [`LICENSE`](LICENSE) file in the root directory of this source tree.
