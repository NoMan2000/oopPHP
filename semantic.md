## Composer

- Composer is a semantic versioning system for PHP.
- Composer allows you to install both global dependencies and local dependencies.
- Composer uses a `locally global` dependency chain.  I.e. each dependency chain is linked, there can only be one version of the software installed at any time.
- Because of this, there can be conflicts in the system.
- `composer why` and `composer why-not` will tell you why it is using a particular version of any given software package. 
- You can install composer in as many folders as you wish, if you really need to have a specific set of dependencies that conflict with each other. 

## Semantic Versioning

[Semantic Versioning](http://www.semver.org)

- Semantic versioning is composed of three parts:  The major release, the minor release, and the patch version.
- The major release is the first number, e.g. `1.04.9`.  In that formula, the `1` is the major version release.
- Anytime a change introduces breaking changes into the application, it is supposed to undergo a major version update.
- The minor release is supposed to be a release that adds new functionality, but does not alter the behavior of the existing application.  In the example `1.04.9`, the `04` portion is the minor release.
- In cases where software has no major version like `0.4.5`, the operaters used to constrain software will have different effects.
- Finally, the patch version is the last number.  This is supposed to be updated when a bug fix or patch has been issued.  It should introduce no new behavior.
- Even though these are the definitions, not everyone follows them.  For that reason, having tests to find out if anything breaks is essential for an application.

## Operators

[Packagist test](https://semver.mwl.be/)

- Composer has numerous ways to match which versions of software you wish to require.
- The `=` sign means that the version **must** match the exact version in your code.  This is often not used because if there are dependency chains, it will fail them.  

- `>=5.3.0,>5.2.0,<5.5.0`
- `^5.3`
- `~5.3`
- `5.3.*`

The tilde operater `~` means to match the `patch version` only.  I.e. 


