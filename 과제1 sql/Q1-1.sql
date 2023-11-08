SELECT cs.name, s
 FROM (SELECT custid, avg(saleprice) s
 FROM Orders GROUP BY custid) od, Customer cs
 WHERE cs.custid = od.custid;