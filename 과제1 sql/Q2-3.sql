CREATE OR REPLACE VIEW highorders
AS SELECT od.bookid, bk.bookname, cs.name, bk.publisher
FROM Customer cs, Orders od, Book bk
WHERE cs.custid=od.custid AND od.bookid= bk.bookid AND saleprice>= 20000;