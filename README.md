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
## 인덱스
[인덱스 정리](https://jojoldu.tistory.com/243)
```
InnoDB <- mysql이나 mariaDB에서 데이터베이스를 관리하는 저장 엔진
.frm 파일 < - 데이터베이스 스키마 구조 저장
.myd 파일 <- data 파일
.myi 파일 <- index 정보

데이터파일과 인덱스파일이 구분됨

ACID : 원자성, 일관성, 독립성, 지속성

가장 많이 사용되는 저장장치 : 하드디스크
하드디스크는 원형의 플레이트로 구성, 플레이트는 논리적으로 트랙과 섹터로 나뉨

rpm : Revolutions per minute : 모터에 의해서 분당 회전하는 속도
latency time : 데이터를 읽을 때 엑세스 암이 이동하는 시간
transfer time : 주기억장치로 읽어오는 시간

엑세스시간 access time : 탐색시간 seek time < -엑세스 헤드를 트랙에 이동시키는 시간 접근하는시간

seek time -> latency time -> data transfrer time(데이터를 메모리에 읽어들이는 시간)

access time = seek time + latency time + transfer time 엑세스 시간
```
## 23.09.25 MySQL Physical & Logical Architecture
```
client connector : ODBC, JDBC, Python, PHP, .NET 플러그인 방식 mySQL server로 연결하는 역할을 한다.

server <- Query Cache,
데이터를 생성하고 가져오는 것을 수행

mysqld: MySQL Server daemon program <- 실행되고 있는 프로그램
멀티 스레드 프로세스 : 여러 개의 세션을 함께 처리(연결 작업 등등)
데이터베이스에 연결하는 여러 사용자들의 Connection을 관리해주는 역할
Connection Management

Query Cache < 쿼리가 중복된 내용이라면 client는 다른 client에게 더 빠르게 쿼리
결과를 받을 수 있다.

제일 하단에 storage Engine이 존재 InnoDB : 완전한 ACID를 만족시키는 엔진이다.

NDB (For MySQL Cluster) 여러 개의 Cluster를 분배해서 여러 개의 멀티플 mysqld를 사용한다.

MyISAM : 완전한 트랜직션 저장 엔진이 아니다. 파일, 키, 메타 데이터, 쿼리 캐시 등을 사용한다.

MEMORY : 완전한 트랜직션 저장 엔진이 아니다. 

ARCHIVE : 완전한 트랜직션 저장 엔진이 아니다. 많은 양의 데이터를 단순히 저장하는 형태

CSV : 콤마로 분리된 값의 포맷 형태

Parser : SQL Syntax를 검사해서 SQL이 실행되는 동안 SQL_ID를 관리한다.

Table Metadata cache <- 자주 쓰는 Metadata는 Cache에 가져다 놓고 쓴다.

Storage Engine : 실제 물리적인 데이터(저장장치에 실제로 저장된데이터)
파일 관리와 위치를 MySQL 컴포넌트가 저장

Optimizer : 효율적인 쿼리 실행 계획을 만들어준다. query plan
어떻게 쿼리를 실행하는 것이 좋은 지를 만들어 준다.

key cache : MyISAM에 index table의 캐시를 가져다 놓고 쓴다. 불러오는 시간, 찾는 시간 단축

엔진을 선택하는 기준 : 도메인 구축할 때 분야를 보고 판단

MySQL 파일 저장위치알려주는 명령어 : show variables like 'datadir';

데이터 파일(ibdata) : 확장자는 .ibd, 테이블과 인덱스로 구성 

폼파일(frm File) : 테이블을 구성하는 필드, 데이터 타입에 대한 정보 저장
데이터베이스 구조 등의 변경사항이 있을 때 자동으로 업데이트 됨
```
## 23.10.05
```
connection thread : 멀티 스레드
query cache : 자주 쓰는 쿼리를 저장
parser : 단어들을 쪼개서 문법을 체크하고 생성한 쿼리의 sql_id를 만든다 (번역기)
optimizer : sql 쿼리를 실행
storage engine: 데이터 파일에서 데이터에 접근한다.

innoDB : plugin 방식 여러가지 형태의 저장장치를 선택할 수 있는 데 그 중 innoDB를 가장 많이 사용한다 트랜직션 처리가 잦은 업무에 사용한다.

Tablespace :innodb의 인덱스방식의 table저장구조이다. 메모리를 가져와서 테이블을 보여준다.
innoDB의 작업공간은 Buffer pool 데이터와 인덱스 등 특정페이지를 저장한다.
log files db서버가 중지되거나 했을 때 log파일을 둔다. 복구를 위해서

check point : 백업 구간. 이정표milestone
undo : 작업을 취소한다. 되돌린다.
redo : 재실행
commit : 물리 저장장치에 저장한다.

이노db tablespace 구조 멀티플 데이터파일을 저장하는 논리적인 구조

change buffer : innodb buffer pool을 찾는 장치
adaptive hash index : 메모리의 컨텐츠의 index를 저장하는 장치

system tablespace : innoDB 저장하는 장치
General tablespace : 공유하는 tablespace가 멀티 테이블 데이터를 저장한다.

double write buffer : page를 저장장치에 읽는데 innoDB 메모리에 있는 내용을 그대로 저장한다.
REDO logs : 문제가 생겼을 때 복구
temporary tablespace : 작업 중 커밋을 하지 못한 임시 파일들을 저장

DB Buffer cache LRU 알고리즘 사용 가장 사용빈도가 높은 데이터 저장 관리

innoDB 메모리 속 데이터 구조를 저장하는 메모리 공간
저장 데이터구조 : 엑세스할 테이블 및 인덱스 데이터를 캐시

버퍼 풀 LRU last recently used 알고리즘 : LRU 알고리즘 변형을 사용하여 목록으로 관리
새 페이지 추가 : 공간이 필요한 경우 가장 최근에 사용된 페이지가 제거

buffer pool list : 중간점 삽입 전략 사용 : 새로운 것이 들어오면 끝에 추가가 된다.
가장 오래된 것은 밀려나서 꼬리쪽에 있다가 쫒겨난다.

new sublist 맨 위의 최근에 들어온것
old sublist 맨 아래의 오래된 것

블록 단위가 여러개 
```
## 23.10.16
#### 인덱스와 B-tree
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/18ced1dc-93e1-4402-bfd4-b53ea2b64ade)    
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/f200fd53-a89f-49f2-b9a5-776cdd53eab1)    
```
인덱스란 최근에 사용된 것들을 보관해두는 InnoDB 버퍼 캐시 메모리에 데이터가 있는 지 검색
검색해서 없으면 디스크에서 찾는다.

스키마 오브젝트 : 기본키를 가지고 있는 인덱스가 있다.
찾는 속도를 증가시키기 위해서

인덱스를 가지고 있는 테이블 : 테이블안에 인덱스를 저장시킨다.

스키마에 대한 인덱스를 지정할 수 있다. 인덱스명

B-tree 이진트리

RDBMS, 키와 키에 해당하는 페이지 값을 저장 관계형 데이터베이스

자식이 2개
잎노드에 안댁스 엔트리가 들어간다.
인덱스 엔트리 구조 : 인덱스 엔트리 헤더, 키 길이, 키 값, rowid가 들어간다.
높이는 동일

B-tree 구조 root node, internal node, leaf node\
키값은 오름차순 저

Order m 내가 루트면 가질 수 있는 최대 자식 수 Order m

자식이 3개있는 잎에서 키의 개수는 2

차수가 3이면 3/2 = 1.5 -> 2개의 자식

모든 리프 노드는 같은 깊이

Order 5인 최대 자식수가 5인 B tree에서
키의 수는 최대 자식수-1 = 5-1 = 4
자식의 최대 수는 5개

Order4 면 키가 3개 k1, k2, k3 <- root

root에서 3개
그밑에서 12개 3 x 4 = 12
그밑에 48개 12 x 4 = 48
그밑에 1292개 48 x 4 = 192  
=255개

차수 이상이면 오버플로가 발생하고 만들 때 정렬 왼쪽은 작은 값 오른쪽은 큰 값으로 정렬
리프 노드의 높이를 갖게 해준다.
```
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/22885dfd-a7fb-440a-967e-6c50305e9d8f)
```
정렬된 속성과 데이터의 위치만 보유하므로 테이블보다 작은 공간을 차 

데이터의 수정, 삭제 등의 변경이 발생하면 인덱스의 재구성이 필요

B+ tree : B 트리의 확장으로 중복 키들 가능, 연결리스트를 사용
```



![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/b464da7c-39b7-456e-aec1-24044e873a85)
```
B-tree의 밸런스 트리

2가지 타입의 블록(노드)
1. 탐색을 위한 가지 블록
2. 값을 저장하기 위한 리프 블록
-연속된 키 값의 레코드에 대한 rowid 저장
레코드들에 대한 시작점의 주소

RID(Row Id)에 의해 실제 데이터의 저장위치를 찾음

rowid를 가지고 테이블이 시작하는 곳을 찾음

인덱스의 종류: 클러스터 인덱스, 보조인덱스

시스템에서 primary key 기본적으로 만들어지는 인덱스 -> 클러스터 인덱스 영어사전

두 번째 인덱스만들때 create index -> 보조 인덱스 UNIQUE 2차인덱스-> 중복가능

보조 인덱스를 검색하여 기본키 속성 값을 찾은 다음 클러스터 인덱스로 가서 해당 레코드를 찾음

루트노드 - 리프노드 인덱스 블록에서 ROWID(블럭번호-블럭내의 행 순번)를 가지고 데이터를 찾음

클러스터인덱스와 보조인덱스 동시사용 -> 보조인덱스 - 클러스터 인덱스 - 테이블

보조인덱스를 통해서 1/2 찾고 그 키값으로 클러스터 인덱스에서 테이블을 찾음

인덱스의 생성

where절, 조인에 자주 사용되는 속성
속성이 지속적으로 업데이트되는 경우 사용하지 않음
속성의 선택도(중복도)가 낮을 때 유리함 중복되지 않을 때 좋다.
단일 테이블에 인덱스가 많으면 속도가 느려질 수 있음

Create index ix_Book On Book(bookname); ix_Book이름의 인덱스를 Book테이블의 bookname 속성을 대상으로 만들어라
Create index ix_Book2 On Book(publisher, price); ix_Book2이름의 인덱스를 Book테이블의 publisher, price 속성을 대상으로 만들어라

show index from book; book 테이블의 인덱스를 보여준다.
sql쿼리가 테이블의 속성값을 어떻게 찾아갔는지 보려면 query - explain Current Statement

인덱스의 재구성

키가 새로 들어오면 인덱스를 재구성해야한다.
analyze table 명령을 사용

기억장소에서 fragmentation 단편화 발생
삭제된 레코드의 인덱스 값이 비어있는 현상<- 성능저하 야기, 인덱스 재구성하여 조각화 최소화

Book 테이블의 인덱스를 최적화하시오
Analyze TABLE Book;

인덱스 ix_Book을 삭제하시오
DROP INDEX ix_Book;
```
## 5장 데이터베이스 프로그래밍
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/29200dbe-5656-44ed-a467-5e9015142b0f)    
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/b24f1b52-ea4a-4913-823b-0a7ca242b01b)

```
1. DBMS에 데이터를 정의
2. 저장된 데이터를 읽어옴
3. 데이터를 변경하는 프로그램을 작성

일반 프로그래밍과의 차이 : 데이터베이스 언어인 SQL을 포함한다

SQL 전용 프로그램(Shell, SQL Workbench) -> DBMS -> DB
프로그래머가 응용프로그램(SQL + 자바) -> DBMS -> DB 삽입 프로그래밍(임베디드 프로그래밍)

DB에 접속하기 위해서는 응용프로그램과 DBMS를 연결해주는 JDBS, CRI 등의
미들웨어 인터페이스가 필요함

1. SQL 전용 언어를 사용하는 방법 : SQL 자체 기능을 확장, MySQL, Oracle
변수, 제어, 입출력 등의 기능을 추가한 새로운 언어를 사용

MySQL : Stored Program
Oracle : PL(Programming Language)
SQL Sever : T-SQL (Transaction)언어

2. 일반 프로그래밍 언어에 SQL을 삽입하여 사용하는 방법

자바, C, C++ 등 일반 프로그래밍 언어에 SQL 삽입하여 사용

3. 웹 프로그래밍 언어에 sql을 삽입하여 사용하는 방법

JSP, ASP, PHP 등 웹 스크립트 언어인 경우

4GL (4th Generation Language) : 4세대 언어
GUI 기반 소프트웨어 개발 도구
델파이, 파워 빌더, 비쥬얼 베이직
데이터베이스 관리 기능 + 비주얼 프로그래밍 기능 

저장프로그램

서버사이드, 절차적 언어 MySQL의 SQL 확장 버전
프로그램 논리를 프로시저로 구현- 객체 형태로 사용
```
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/ce3bd976-d2fd-4339-abd5-dd719731a207)
```
MySQL의 SQL 전용 언어 : 데이터베이스 응용프로그램 작성에 사용, 함수와 비슷한 개념
프로그램의 논리를 프로시저로 저장해서 함수처럼 사용

구성 : 테이블, Views, Stored Procedures, 트리거, Functions, 클러스터 인덱스

sql 문에 프로그래밍 기능 추가 <- 변수, 제어, 입출력 등

작성 도구 : MySQL Workbench에서 바로 작성하고 컴파일하고 결과 실행
cmd, powershell 등에서도 가능

DB Object : Tables, Views, Stored Procedures, Functions

저장객체 : 작업 순서가 정해진 독립된 프로그램 수행 단위

Stored Routine 저장 루틴 : 반복적으로 작업을 수행하기 위해 만들어놓은 루틴
- Procedure, Function

Procedure <- 리턴값이없이 결과를 보여주기만 하면 된다.
Function <- 여러 값을 받아서 하나의 리턴값을 준다.

Trigger: Insert, delete, update 등 데이터 변경문 실행 시 자동으로 실행되는 프로시저

Event Scheduler : Analyze index 같이 인덱스를 최적화하고 정기적으로 실행하는 등의 이벤트를
자동으로 일정 시간에 실행되게 해주는 것을 이벤트 스케줄러

저장 프로그램을 만드는 문법 : create procedure name_of_SP[(파라미터 데이터타입1, 파라미터 데이터타입2)] 파라미터 호출되서 전달받는 매개변수

변수가 먼저 나오고 데이터타입이 나오는 점이 다르다.
```
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/9e98ffcb-e427-4e2e-84ea-7cde8e0b88ba)     
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/87df80f8-1662-452a-b76a-2497eff813dd)      
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/e44bb63f-2a83-407b-8f35-25906cdaf437)       
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/98274612-21ea-4375-8a2f-d7274596f755)       
```
Begin ~ END; <- 프로그램의 BODY 부분 선언(Declaration part)부분과 실행(Execution part)부분이 있다.
데이터를 위한 메모리를 잡기 위해 선언 부분 먼저나오고 실행 부분이 그 후에 따라 나오는 형태

delimiter 문장 마침표로 // 을 쓰겠다.

call 을 사용하여 procedure를 실행할 수 있음

sql+을 누르고 작성한 후에 실행하면 stored procedure에 저장됨
call madang.dorepreat(1000);

SET @x = 0; x 변수 선언하고 0 삽입
REPEAT SET @x = @x + 1; x에 1더하고 x에 삽입
UNTIL @x > p1
END REPEAT; x가 p1보다 클 때까지하고 크면 반복 종료

SET @x = 0; 선언부
REPEAT ~ UNTIL ~ END REPEAT; 반복문 실행부

매개변수(parameter) : p1 INT

기본 MySQL 문장구문(delimeter) ;
프로시저 끝과 문장구분기호 혼돈된다. 세미콜론으로 동일하기 때문
문장구분기호를 시작할 때 delimeter // 로 쓰고 끝나고 다시 delimeter ; 세미콜론으로 반환

mysql delimeter를 재정의 redefine

재정의 : delimeter //
실행 후 환원 : delimeter ;

프로시저가 끝나면 END // delimeter ;
```
## 23.10.23
```
삽입 작업 프로시저

Insert를 사용하여 입력 가능

프로시저 사용 삽입 장점
복잡한 조건의 삽입 작업 수행 가능 (인자값만 바꿔서 수행할 수도 있음)
저장해두었다가 필요할 때마다 호출하여 사용 가능

workbench-stored procedure-create stored procedure-routine-apply

delimeter {  } : 구문 종료 기호 설정
begin end 저장프로그램 문 블록화, 중첩 가능 begin { sql 문 } end
if else -> 조건 검사 결과에 따라 문장을 선택적으로 수행

InsertOrUpdate() 프로시저 15번에 스포츠즐거움을 삽입 가격 25000
15번에 값이있다면 값을 20000으로 Update

결과 반환 프로시저 안에 sql select avg(price) 프로시저 매개변수에
OUT 키워드를 작성하면 출력 매개변수가된다

into로 저장된 평균값 AverageVal을 OUT AverageVal에 의해 리턴된다.

call AveragePrice(@myValue) myValue 변수에 리턴 값을 저장한다.
select @myValue -> 리턴 값 출력

 
INTO 변수에 값을 저장

커서 사용 프로시저 현재 위치를 포함하는 데이터여소

일련의데이터에 순차덕으로 접근할때 버튼역할을 하는 것


```

