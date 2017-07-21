function text() {
};
text = new text();
number = 0;

text[number++] = 'Nuestra Hemeroteca d\u00EDa a d\u00EDa es m\u00E1s extensa.”'
text[number++] = '“Contamos con m\u00E1s de 1, 000, 000 de informaci\u00F3n digital.”'
text[number++] = '“Contamos con m\u00E1s de 7,800 revistas f\u00EDsicas.”'
text[number++] = '“Contamos con m\u00E1s de 1,500,000 libros f\u00EDsicos.”'

increment = Math.floor(Math.random() * number);
document.write(text[increment]);