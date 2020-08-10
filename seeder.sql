use myquizLaravel;

Insert into questions(title) values ("Q1");
Insert into questions(title) values ("Q2");
Insert into questions(title) values ("Q3");
Insert into questions(title) values ("Q4");
Insert into questions(title) values ("Q5");
Insert into questions(title) values ("Q6");

Insert into answers(title, question_id, correct) values ("a1", 1, true);
Insert into answers(title, question_id) values ("a12", 1);
Insert into answers(title, question_id) values ("a13", 1);
Insert into answers(title, question_id, correct) values ("a14", 1, true);

Insert into answers(title, question_id, correct) values ("a2", 2, true);
Insert into answers(title, question_id) values ("a21", 2);
Insert into answers(title, question_id) values ("a23", 2);
Insert into answers(title, question_id) values ("a24", 2);

Insert into answers(title, question_id, correct) values ("a31", 3, true);
Insert into answers(title, question_id) values ("a32", 3);
Insert into answers(title, question_id) values ("a33", 3);
Insert into answers(title, question_id) values ("a34", 3);


Insert into answers(title, question_id, correct) values ("a41", 4, true);
Insert into answers(title, question_id) values ("a42", 4);
Insert into answers(title, question_id) values ("a43", 4);
Insert into answers(title, question_id) values ("a44", 4);

Insert into answers(title, question_id, correct) values ("a51", 5, true);
Insert into answers(title, question_id) values ("a52", 5);
Insert into answers(title, question_id) values ("a53", 5);
Insert into answers(title, question_id) values ("a54", 5);

Insert into answers(title, question_id, correct) values ("a61", 6, true);
Insert into answers(title, question_id) values ("a62", 6);
Insert into answers(title, question_id) values ("a63", 6);
Insert into answers(title, question_id, correct) values ("a64", 6, true);
