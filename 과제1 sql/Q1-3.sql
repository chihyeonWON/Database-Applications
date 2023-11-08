SELECT SUM(saleprice) "total"
 FROM Orders od
 WHERE EXISTS (SELECT *
 FROM Customer cs
 WHERE custid <= 3 AND cs.custid = od.custid);