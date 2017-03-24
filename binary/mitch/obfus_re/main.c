#include<stdio.h>
#include<stdlib.h>
#include<string.h>

#pragma clang diagnostic push
#pragma ide diagnostic ignored "OCDFAInspection"
#define LENGTH 19
void main() {
    // Output from key ^ RANDOM
    char const obfuscated[LENGTH] = "\x04\x01\x01\x0e\x06\x0f\t\x16\x1d\x1b\x0f\x00\x07\x04\x0b\x10\x16\x0b\r";
    // Random characters
    char const random[LENGTH] = "LDSKJFLEISJFKELISJE";
    char buf[LENGTH];
    char xor_buf[LENGTH];
    printf("Give me the password:\n");
    fflush(stdout);
    if(fgets(buf, sizeof buf, stdin) != NULL) {
        // Calculate user input xor
        for(int i=0; i<LENGTH; ++i) {
            xor_buf[i] = (char)(buf[i] ^ random[i]);
        }
        if(strcmp(xor_buf, obfuscated)) {
            printf("Wrong!");
        } else {
            printf("You found the key!");
        }
    }
}

#pragma clang diagnostic pop
