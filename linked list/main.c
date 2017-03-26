#include <stdlib.h>
#include <stdio.h>
#include <stddef.h>

typedef struct node
{
	int value;
	struct node * next;
} node;

int main() {
	node * first = NULL;
	
	first = malloc(sizeof(node));
	
	if(first == NULL) {
		return 1;
	}
	
	first->value = 1;
	first->next = malloc(sizeof(node));
	first->next->value = 2;
	first->next->next = NULL;
	
	node * current = first;
	
	while (current != NULL)
	{
		printf("%d\n", current->value);
		
		current = current->next;
	}
}
