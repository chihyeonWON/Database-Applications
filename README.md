# Database-Applications
컴퓨터공학과 데이터베이스 응용 정리입니다.
![image](https://github.com/wonchihyeon/Database-Applications/assets/58906858/9e47b566-ed8d-4142-b4da-1492c0be9565)
```
mysql/sql 서버는 from 없이가능
오라클은 from Dual 테이블(가상 테이블)

Select custid "고객번호" < custid as "고객번호" as 생략
round( , -2) round 반올림하는 함수 2번째 자리(십의자리)

문자열은 s는 "로 묶음

CHR(K) 정수 K를 아스키 코드로 
CONCAT(s1,s2)  s1, s2 두 문자열 연결
INITCAP(s) 문자열의 첫 번째 알파벳을 대문자로 변환 the soap -> The Soap 문자열의 첫 번째
LOWER(s) 문자열 모두를 소문자로 변환
LPAD(s,n,c) 문자열s 왼쪽에 지정한 자리 수 n까지 c로 채운다.
LTRIM(s1, s2) s1에서 왼쪽부터 s2 문자들을 지움

replace(s1,s2,s3) s1에서 s2를 s3로 바꾼다.
RPAD(s,n,c) s에서 n자리 수까지 오른쪽에서 c로 채운다.
RTRIM(s1, s2) s1에서 오른쪽에서부터 s2 문자들을 지움
SUBSTR(s,n,k) 문자열s에서 n에서 k까지의 문자열을 추출
TRIM(c FROM  s) 문자열s 양쪽에서 c문자를 지운다.
UPPER(s) : 모든 문자열을 대문자로 변환한다.

ASCII(c) 아스키코드를 문자로
INSTR(s1,s2,n,k) s1에서 s2가 n번째부터 k번째 나타나는 자리수
LENGTH(s) 문자열s의 글자 수를 반환

CHAR_LENGTH : 글자 수
LENGTH : 바이트 수 "축구의 역사" > 3 x 5 = 15 + 1(공백) = 16 유니코드체계 3개

SUBSTR(s,1,1) s에서 1번째에서 1개의 문자

select 절 맨 앞 애트리뷰트는 group by에 똑같이 넣어줘야한다.
```
## 날짜 시간 함수
![image](https://github.com/wonchihyeon/Database-Applications/assets/58906858/b1dbc4d4-f21c-4b0e-ac43-e9dacb796c83)
```
STR_TO_DATE(string,format) > 문자형 데이터를 날짜형으로 반환 "2020-09-08" -> 2020-09-08
DATE_FORMAT(date, format) > 날짜형 데이터를 문자열로 반환
ADDDATE(date,interval) > (date에 INTERVAL 10 DAY) 10일 만큼 더

Date(date) 날짜 부분만 반환
DATEDIFF(date1,date2) < date2에서 date1 날짜 차이반환
LAST_DAY(date) date의 마지막 날짜 출력
SYSDATE DBMS 시스템상의 오늘 날짜를 반환하는 함수

%w, 요일 순서 월=1
%W 월요일
%a 월
```
## NULL 값 처리
![image](https://github.com/wonchihyeon/Database-Applications/assets/58906858/39b89aeb-d6e3-4dab-b9de-fd444dd2ff18)
```
아직 지정되지 않는 없는 상태
주의할 점 : 비교가 불가능함, NULL 가지고 연산하면 NULL이 나온다.
집계 함수 Count < NULL 값은 제외됨
NULL+숫자 연산(AVG, SUM)의 결과는 무조건 NULL

NULL값처리

IFNULL(속성,속성이 NULL일때 값) 함수
```
## 행 번호 출력
```
MySQL 변수는 이름 앞에 @ 기호를 붙임
변수 치환 SET과 := 기호를 사용함

SET @seq:=0; seq변수에 0대입
0 + 1 @seq:=@seq+1 <- 첫번째값 1
1 + 1 @seq+1 <- 2
where @seq < 2 <-seq 초기값이 2 미만인 것 
```
## 서브쿼리(Subquery) 부속질의
```
하나의 sql 문 안에 다른 sql 문이 중첩
select, insert, update, delete 문이나 다른 하위 쿼리 내부에 중첩

다른 테이블에서 가져온 데이터를 이용
현재 테이블에 있는 정보를 검색/가공

데이터가 대량일 때
데이터를 모두 합쳐서 연산하는 조인보다 필요한 데이터만 찾아서 공급해주는 부속질의가 성능 우수

주질의(외부질의)main query
부속질의(내부질의)sub query

부속질의를 먼저 계산

select 절에 부속질의 < 두 테이블에서 같은 속성 하나를 가져올 때 스칼라 부속질의 Scalar Subquery
from 절에 부속질의 < inline view
where 절에 부속질의  nested subquery
```
## 단일행 부속질의(Single Row Subquery)
```
Single Row Subquery : 하나의 컬럼으로 구성된 조회 결과
```
## Multiple Row Subquery
```
where 뒤에 여러 개의 컬럼을 구성

IN, ANY, ALL, EXISTS 연산자로 얻음
여러 개의 행을 outer 쿼리에 반환
where 또는 Having ~ IN 연산자 사이
```
## 상관 부속질의 Correlated Subquery
```
중첩 서브쿼리의 한 종류
주질의의 속성을 내부질의 사용

서로 관련성이 있는 테이블의 속성
```
## Uncorrelated Subquery
```
주질의의 테이블과 부속질의의 테이블이 다름

각 테이블에 대해서 한 번 평가되는 쿼리
```
## 스칼라 부속질의 - Select 부속질의
```
부속질의의 결과 값을 단일 행, 단일 열의 스칼라 값으로 반환
주질의와 부속질의의 관계는 상관/비상관 모두 가능
테이블이 같아도되고 달라도 됨
```
## 인라인 뷰 - FROM 부속질의
```
FROM 절에 사용되는 부속질의
부속질의의 결과는 테이블 <- 가상의 테이블(질의가 끝나면 없어짐)

상관 부속질의로 사용될 수는 없음
(이유는 가상의 테이블인 뷰 형태로 제공되기 때문)
```
## 중첩질의 - WHERE 부속질의
![image](https://github.com/wonchihyeon/Database-Applications/assets/58906858/4085086e-2d57-4139-97fe-4ee061d57aba)
```
부속질의의 결과가 반드시 단일 행, 단일 열 반환
아닐 경우 질의를 처리할 수 없음
비교 연산자

WHERE 절에서 사용되는 부속질의
WHERE 절은 보통 데이터를 선택하는 조건 혹은 술어와 같이 사용됨
중첩질의를 술어 부속질의라고도 함

IN 연산자

NOT IN 연산자

EXISTS (특정 속성 값이 앞에 안나옴)
IN 은 특정 속성 값이 앞에 나옴

A IN (WHERE~)
EXISTS (WHERE~)
```
## 뷰 VIEW
[뷰 문법정리](https://m.blog.naver.com/regenesis90/222228928522)
```
뷰의 생성, 삭제, 수정

Table
View
Object
Procedure
Function

TableA, TableB <- query질의를 해서 결과를 View로 보여준다.

뷰<- 하나 이상의 테이블(Defining Table)로 만든 가상테이블(Virtual Table)

뷰를 통해서는 수정할 수 없다.<- 가끔 수정하는 기능을 구현할 수 있다. dyana set
뷰는 읽기만 가능, 데이터 저장소가 필요없다.
쿼리는 select 형태

장점 : 사용자가 요구하는 정보만 가공하여 뷰로 생성 가능 ->편리성
자주 사용되는 질의를 뷰로 미리 정의-> 재사용성
필요한 데이터만 선별하여 보여줄 수 있음 -> 보안성
원본 테이블의 구조가 변해도 응용에는 영향을 주지 않도록 하는 논리적 독립성 제공 -> 독립성

원본테이블의 변경에 따라 같이 변한다.
뷰는 삽입,삭제,갱신 연산에 많은 제약이 따른다 <-다이나믹 set으로 고칠 수 있다.

create view Vorders as (select ~ from where) 뷰 생성
create view 뷰이름 as (select 문) <- 뷰이름의 새로운 가상 테이블 생성

create or replace view 뷰이름 as select <- 뷰 수정(없다면 생성하고 있다면 교체해라)

drop view 뷰이름
```
```mysql
create view 뷰이름A as (
SELECT FROM 구문);
```
```mysql
create or replace view 뷰이름 as select ()
```
```mysql
drop view 뷰이름 
```
