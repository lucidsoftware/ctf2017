#include<stdio.h>

#pragma clang diagnostic push
#pragma ide diagnostic ignored "OCDFAInspection"
void main() {
    printf("The rich need me. The poor have me. Don't eat me or you'll die! What am I?");
    char buf[10];
    _Bool willBeTrue = 1;
    if(fgets(buf, sizeof buf, stdin) != NULL) {
        if(willBeTrue) {
            printf("Wrong!");
        } else {
	    printf("The flag is: HERE IS THE FLAG, DON'T MESS IT UP");
        }
    }
}

#pragma clang diagnostic pop
