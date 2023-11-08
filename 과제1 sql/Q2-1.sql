CREATE VIEW highorders (bookid,bookname,name,publisher,saleprice)
AS SELECT od.bookid,bk.bookname,cs.name,bk.publisher,od.saleprice
FROM Orders od, Customer cs, Book bk
WHERE cs.custid=od.custid AND od.bookid=bk.bookid AND saleprice >= 20000;

SELECT * FROM madang.highorders;