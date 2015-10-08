<?php
include "parsedown/Parsedown.php";



$Parsedown = new Parsedown();

echo $Parsedown->text("
###Scrambled data...
When building the lookup tables I overcomplicated the process by changing the way the data was ordered while Luke simply copied the Belbin table into an array. I had to do a fair bit of mental arithmetic and made several errors in my handwritten work when building the test. Where possible the data structure should mirror the data.

###School Boy Errors...
When we 'designed' the program we did not follow the guideline DRY: Don't repeat yourself. We built 7 separate pages that did roughly the same job with minor differences. We later realized that this made it difficult and buggy to change a feature across the seven pages so I had a stab at solving the problem....

On the other hand I had loads of trouble because I put my logic for adding up the scores into a function when it is only ever called once in the whole application. So another rule could be DOC: Don't over complicate.

###Reinventing the wheel...
When I tried to refactor the 7 question pages into one I again overcomplicated things. I hit a wall trying to rework the logical flow of the program when Marta had already done it perfectly. 'All' I needed to do was replace references to a single question page with code that used used the \$question_id to reference the question in the \$QUESTIONS array.

###Baby Steps...
I also tried to change everything at once and got into a complete muddle that resulted in my brain blowing a fuse. Change one thing at a time - it seems obvious but when 'this' is related to 'that' there is the temptation to change it all at once. I realize refactoring someone else's code is a very different skill set to writing something from scratch.

###Do's and Don'ts

Do:

* Use loops/code to do the work if there are more than 3 similar elements. Don't repeat yourself.

* Break up the code separate include files if the is a ggood reason such as keeping settings out of the code or to make the code more readable.

* Put code that is used many times in a function [(just don't forget about scope!)](http://peter-wilkins-mayden.github.io/acblog/in-scrum-we-trust/).

* If your stuck, explain your design or code to someone else.

* Only change one thing at a time.

* Write pseudo code / start by describing the problem in english

* Write unit tests - small simple tests that check the code works.

Don't

* Scramble the data

* Reinvent an existing structure / logic / program flow that already works.

* Struggle on your own; ask for help on slack or forums (but ask a well formed question!) People love to help if they can. We are very lucky here that we can ask questions on Mayden's general channel and hopefully someone in the company will know the answer.");
