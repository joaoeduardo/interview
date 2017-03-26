#include <stdio.h>
#include <string.h>
#include <math.h>
#include <stdlib.h>
#include <stdbool.h>

bool playerOne(int stones, int possibles[]);

bool playerTwo(int stones, int possibles[]);

int main() {
	int possibles[3] = {2,3,5};

	int stones = 7;

	if (playerOne(stones, possibles)) {
    	printf("First\n");
	} else {
    	printf("Second\n");
	}
	
	return 0;
}

bool playerOne(int stones, int possibles[])
{
    if (stones < 2) {
        return false;
    }
    
    int cont = 0;

    for (cont = 0; cont < 3; cont ++) {
        if (!playerTwo((stones - possibles[cont]), possibles)) {
            return true;
        }
    }
}

bool playerTwo(int stones, int possibles[])
{
    if (stones < 2) {
        return false;
    }
    
    int cont = 0;

    for (cont = 0; cont < 3; cont ++) {
        if (!playerOne((stones - possibles[cont]), possibles)) {
            return true;
        }
    }
}
