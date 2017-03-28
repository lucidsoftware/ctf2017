# Everybody Wins

So this uses an insecure random number generator,
   and does require a few assumptions along the way
Using the userID the server passes back to you, (which you can see in the JavaScript and not the main page)
you have to crack the seed used by the php service, and then generate all of the powerballs.
1. Random seed crack : First assumption you need is using the mt_rand from php
you then find a tool to crack the random seed
http://www.openwall.com/php_mt_seed/
2. The range of userid : Second assumption the userid is from the range of 1,000,000 to 10,000,000
the tool then generates around 50 seeds for this tool
3. Final Step write a php tool to generate the random numbers according to the rules on the webpage, and ping the webpage until it reveals the key
```
for each seed in seeds:
    mt_srand(seed)
    mt_rand(1000000,10000000)
    mt_rand(1,69)
    mt_rand(1,69)
    mt_rand(1,69)
    mt_rand(1,69)
    mt_rand(1,69)
    mt_rand(1,26)
    post (balls={..},userid{...}) game.php
```
