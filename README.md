# Database-Applications
컴퓨터공학과 데이터베이스 응용 정리입니다.

## 중간고사 후기
[잘못된 문제 링크3번](https://yenyen31.tistory.com/34?category=948723)
```
중간고사 결과가 나왔고 2.5점짜리 객관식 2문제와 서술형4점, 5점 나가서 86점이 나왔다.
물론 정확한 답을 알고자하는 내 노력이 부족한 탓이었던인지 인터넷에서 본 잘못된 답을 체크했다.
다음번엔 공부할 때는 사실 여부를 정확하게 확인하면서 학습해야겠다..
```


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

매개변수를 사용하는 경우 값을 결정하고 데이터 엑세스를 시작한다.
커서의 위치의 데이터를 검색한다 

반복 종료 후 커서를 풀어놓는다.

sql안에서 커서라는 오브젝트를 사용하고 버림

커서를 선언하고 만들어진 커서를 오픈
데이터를 결과집합에서 한번의 한행씩 읽어들인다.

커서 사용 프로시저 단계를 서술하라
declare, open, fetch close

지역변수 선언 myinterest integer default 0.0

endofRow boolean default false

declare 커서이름 cursor for 결과집합sql

cursor not found set endofRow 커서가 발견되지않으면 다읽고나서 끝이면 endofRow true면 종료

여기까지가 커서 정의 그 다음 커서 오픋

cursor open

cursor_loop 돌아올 레이블 loop반복키워드

커서가 가리키고 있는 것을 price에 넣음

끝이라면 커서루프에서 leave
아니라면 30000만 보다 높은 조건에 맞는 saleprice값을 price에 넣는다.

30000원 이상인것은 수익률을 10퍼센트 3000원을 먹고 30000원보다 작은것은 이익률을 5퍼센트로 하는 조건문

커서를 이용한 조건에따른 이익률을 저장

close cursor 커서종료

커서종료하고 전체 누적시킨 결과값을 출력 select

fetch로 가져온 컬럼의 수만큼 변수를 선언해줘여한다.

select 두개컬럼이면 변수를 두개 선언해야한다.

프로시저안에서 값을 into로 넣을수있었는데
커서프러시저안의 select into를 써서 값을 넣으면 안된다.커서 프로시저는 결과집합 select를 사용할 것

declare handler 핸들러를 설정할 때 continue handler는 하나씩 계속 볼수있음
 condition value 어떤살태일때 계속하고 에러코드를 뱉을것인지 결정

codition value에 not found error등 사용가능

declare handler not found set으로 썻었음

loop 반복문을 구현해준다. 끝내기위해서는 leave를 쓰면된다. function의  return과 같은 역할

트리거trigger 데이터베이스 테이블에 insert delete update 같은 트랜직션이 발생했을 때 취해야할 액션을 트리거에 정의하면 자동으로 알려주거나 고쳐줌

트리거는 프로시저등과같이 저장 프로그램
테이블과 관련이있는 이름지어진 데이터 오브젝트
자동적으로 실행

응용프로그램안에서 테이블 t에 update insert delete 될때 update trigger

trigger도 프로시저처럼 begin end로 구성
사전작업할때

트리거 수행작업 insert update할때 default 값구성 사전작업, 데이터 제약조건 설정, sql 뷰의 수정, 참조무결성

잘못된 명령을 수행하기전에 관찰하고 오류를 미리체크 그 후에 체크해서 받아들일것인지 체킹

invalid transaction읾때

mysql before와 after 키워드를 제공 instead of는 제공 x

before는 변경문 실행 전에 트리거 발생
after는 변경문 실행 후에 트리거 발생

definer는 트리거를 만든사람을 정의하고 권한 체크를 위함

local에서는 안써도됨 서버에서는 체크해야함
트리거를 만들 권한이 있는지 체크해야함

trigger 생성문

trigger 이름, time(before,after), 이벤트종류(insert delete update)

on 테이블이름

for each row : 커서처럼 한 행마다 처리
트리거order(follow, precedes)
트리거 여러개중에 순서를 정해줌 이거는 생략가능함
follow 다음트리거 precedes 이전에 새로운트리거를 수행할지
other 트리거가

set global log_bin_trust_function_creators ture면 트리거나 함수를 생성할 수 있게됨
저장 함수 생성 가능 여부 검토

create trigger 트리거 이름 (트리거 이름은 의미있는 걸로)

after insert on book for each row <- 트리거의 특성
for each row 각 행마다 book 테이블에 대해서 insert가 발생한 후에 트리거가 발생하도록 헤드에 써줌
트리거의 이름과 특성을 정의한다.

트리거가 수행할 내용은 begin end에 써준다.

book 테이블로부터 값을 전달받는 부분 new 투플 값 지정자
```
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/ee5f8706-d010-4870-b794-f53d7bf656d9)
```
book 테이블의 value가 new로 연결되어 하나씩 전달이 됨

book 테이블에 14번이 들어감 -> after 트리거 insert after book
insert 된 후에 after trigger가 실행됨
속성값들이 new. 속성값들에 들어감 book_log 테이블에 값이 들어감

트리거는 특정 테이블 아래에 있다. 특정 테이블 객체에 소속됨
```
## 사용자 정의 함수
```
만들어진 함수를 사용하려면 call 명령어를 실행해서 수행한다.

sql문장은 call이 아니라 select from where select 뒤에 쓰면 됨

입력된 값을 가공하여 결과 값을 반환

프로시저 : call 명령

사용자 정의 함수 : select문 또는 프로시저에서 호출 결과값을 반드시 제공하고
스칼라함수가 일반적(단일값 반환)

create function statement return문  데이터 타입을 선언, 파라미터 in파라미터
함수의 파라미터는 값을 전달받는 in밖에 없음 안써줘도 되고

create function 함수이름(매개변수~) RETURNS type 나열

블록 안에는 return s가 없음

int sum <- 일반적인 형태
sum returns int <- 사용자 정의 함수 형태

declaration : int x;
definition : int x=0; declaration and initialized

function의 end; //

set myinterest = price * 0.1;
set myinterest := price * 0.05;

사용자 정의 함수를 select에서도 쓸 수 있고 call x
```
## L2 2-5 데이터베이스 프로그래밍
#### JDBC
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/1b987fbe-695e-40bf-a633-63ea491f503d)
```
클라이언트 사이드 프로그램
자바응용이DB에접속가능하게하는자바API -> JDBC

java.sql : JDBC를 통해서 어플리케이션에 연결하는 방법을 소개함 API
javax.sql : server-side data source

ODBC : 데이터베이스에는 독립적, OS에는 종속적  Object-C Pointer로 구성
JDBC : OS와 데이터베이스에 독립적이다. 자바로 만들어서 다른 곳에서 쓸 수 있음 JAVA Pointer를 사용x

JDBC의 세가지 일을 서술하라.

1. 데이터베이스 서버에 연결한다.
2. SQL문장을 보낸다.
3. 결과를 처리한다.

DriverManager : JDBC 드라이버 관리, DB 연결 설정, 데이터베이스의 연결을 설정하는 JDBC API의 클래스

Driver : 데이터베이스 서버와의 통신을 처리, DriverManager 객체를 사용

Connection : 데이터베이스에 연결하기 위한 모든 메서드가 있는 인터페이스
createStatement() method Statement Object 생성 : db에 sql 문장을 보내기 위함

Statement : 개체를 사용하여 데이터베이스에 sql을 제출, sql문을 실행하고 질의 결과를 반환

ResultSet : 질의 결과 집합 <- 커서 객체를 활용, statement 개체를 사용하여 sql 쿼리를 실행
이 객체는 데이터를 이동할 수 있는 반복자 역할

ResultSet MetaData : 데이터에 대한 데이터(메타 데이터) 유형 및 속성에 대한 정보를 가져오는 데 사용
```
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/b6376f0c-a316-4f6c-a1f5-20b2a61c749e)
![image](https://github.com/chihyunwon/Database-Applications/assets/58906858/f105a2da-0e82-4a0c-a5eb-2c32608e8832)
## 11월 9일
#### 정규화 Normalization
```
정규화(Normalization) 그리고 이상현상(Anomalies)
이상현상을 해결하기 위해서 정규화를 한다.

이상현상의 개념 : 잘못된 데이터베이스 설계

중복 데이터를 갖는 테이블(Duplication) -> 이상현상을 야기
중복(Redundancy) 데이터의 중복

삭제 이상(deletion annomaly)
-> 투플 삭제 시 같이 저장된 다른 정보까지 연쇄적으로 삭제되는 현상
연쇄삭제(triggered deletion) 문제 발생

삽입 이상(insertion anomaly)
튜플 삽입 시 특정 속성에 해당하는 값이 없어 NULL 값을 입력해야 하는 현상 -> null 값 문제 발생

수정 이상(update anomaly)
불일치의 문제 : 튜플 수정 시 중복된 데이터의 일부만 수정되어 데이터의 불일치 문제가 일어나는 현상
```
![image](https://github.com/mr-won/Database-Applications/assets/58906858/b8c49585-674d-470a-b53c-d817fae649c2)
```
스포츠 경영학과를 삭제하려고 하는 데 학생정보도 같이 삭제됨 -> triggered deletion 연쇄 삭제현상
박지성 학생 주소를 변경 - 불일치 문제
박세리 학생을 넣는데 강좌이름, 강의실 속성의 데이터 값이 NULL이기 때문에 Null 문제 발생

course code가 없어져야 할 때 코스와 관련은 되어있찌만 교수와 관련된 정보까지 같이 삭제된다.
코스와 교수 정보가 혼합되어 있을 때 삭제 했을 때 값이 같이 삭제된다. 연쇄 삭제
같은 레코드에 혼재되어있기 때문이다.
연쇄 삭제가 발생한다.

과목 코드를 넣는데 과목 코드가 없을 때 NULL 문제 삽입 문제가 발생한다.

519번 사원의 주소를 바꿀 때 한 데이터만 수정되기 때문에 불일치 문제가 발생한다.

SELECT 문은 이상현상을 확인할 수 없음(검색문은 이상현상 없음)
SQL 조회(RETRIEVAL) 질의문 실습 -> 이상현상없음(I,U,D Insert, update, delete)

C 과목을 듣는 학생조회하려고 하는데 200번을 삭제했을 때 c 교과목 정보가 없어짐

질의 7-3에서 조건을 두 개걸어서 sid가 100이고 class fortran인 것만 고치기 때문에
하나는 15000원 20000원이 되므로 불일치 현상이 발생한다

정규화 방법 : 함수 종속성

함수의 특징 중 종속성 : 입력값에 대해서 하나의 결과를 낸다.
이상현상을 제거해주고 좋은 데이터베이스를 생성해준다.

테이블의 구조를 수정하는 방법 : 테이블을 분리한다.


enroll테이블(수강id, 과목정보) price(과목정보, 가격)
```
## 23.11.13
![image](https://github.com/mr-won/Database-Applications/assets/58906858/df8032a9-c16b-4d89-bfad-cd7074b8117a)
```
릴레이션의 특징
1.속성은 단일 값을 가진다,
2.속성은 다른 이름을 가진다.
3.한 속성의 값은 모두 같은 도메인 값을 가진다.
4. 속성의 순서는 무순서이다.
5. 중복된 투플은 허용되지 않는다.

릴레이션이면 1정규화로 들어간다. 종속성을 따져서 이상현상이 생기면 분리한다.

함수 종속성의 개념

쿠키값은 쿠키상자의 수에 종속된다. 함수적으로 종속된다.
쿠키상자의 수가 쿠기 값을 결정한다. 여기서 쿠키상자의 수를 결정자라고 함(DETERMINANT)

차번호가 배기량을 결정한다 -> 차번호는 결정자이다.
배기량이 차번호를 결정한다 -> 부적절하다.
1:1 관계

함수 종속성 : Funcitonal Dependency

속성이름 : R 속성이름 x, y
x 각각의 값이 y값에 한 개씩 대응될 때 -> X는 Y를 함수적으로 결정한다.라고 함

r(X,Y) t1.X = t2.X 이면 t1.X = t2.Y라는 조건 만족시 r은 FD X->Y를 만족한다.
함수종속성을 만족한다.

X를 결정자 Y를 종속 속성이라고 한다. X에 의해 값이 결정되기 때문이다.

함수 종속성은 보통 릴레이션 설계 때 속성의 의미로부터 정해짐

한 릴레이션에 학생, 수강, 성적 정보가 모두 들어가 있다.

동명이인이 존재할 때 학생이름은 학과와 종속적이지 않을 수 있다.

함수 종속성 다이어그램 (Functional Dependency Diagram FDD)
릴레이션의 속성 직사각형, 속성 간의 함수 종속성 화살표, 복합 속성 : 직사각형으로 묶어서 그림

Trivial FD(당연 함수종속)
종속자가 결정자의 속성집합에 포함하면 당연 함수종속이라 함

B가 A에 포함되어있을 때 AB->B 자기 자신이라서
종속자의 속성이 결정자의 속성에 포함되어 있으면 당연함수종속이라고 부른다.
X->X
XY->X

Armstrong's Axioms

y가 x의 부분집합이면 trivial fd 당연함수종속성을 만족한다. 부분집합 규칙
Subset::Reflexive rule

증가규칙 z를 양쪽에 넣음

이행규칙 : x->y y->z 이면 x->z이다.

결합 규칙 x->y and x->z then x->yz

합성 규칙 x->y and a->b xa -> yb

분해 규칙 x -> yz x->y and x->z

유사이행 규칙 x->y and wy -> z 이면 wx -> z
```
# 23.11.20
```
정규화 데이터를 구조화하는 프로세스 : 설계에서 중복을 최소화
이상현상이 발생하는 릴레이션을 분해
이상현상을 일으키는 함수 종속성에 따라서 분해
정규형이 높을 수록 이상현상은 줄어듦

정규형을 높일수록 이상현상은 줄어든다.

제1정규형 : 릴레이션 R이 모든 속성 값이 원자값을 가진다.
원자값::Atomic Value
제 1정규형으로 변환

고객취미들(이름, {취미들}) {취미들} : 반복 그룹을 표현해준다.
{}은 반복그룹을 표현
-> 반복안되고 하나의 값만 있어야 한다.
고객취미(이름, 취미) 릴레이션으로 바꾸어 저장
제 1정규형을 만족

반복그룹이 있으면 릴레이션도 아니다. 논릴레이션
하나씩이라면 제 1정규형을 만족한다.


(추신수, {영화, 음악}) -> 영화, 음악이 여러 개가 있으면 안된다. 나열식은 허용하지 않음

2정규형이 되려면 1정규형을 만족해야 한다.
릴레이션의 기본키가 복합키일 때 -> 두 개 이상의 속성으로 키를 만들 때
복합키의 일부분이 다른 속성의 결정자인지 여부 판단

{A, B} 속성 두 개를 키로 한다. A, B가 기본키이면 모든 속성을 족송시킨다.
기본키는 내 릴레이션의 모든 속성을 종속시킨다. 개별 속성 하나가 결정자이면 문제가 된다.

릴레이션 R이 제 1정규형이고 기본키가 아닌 속성이 기본키에 완전 함수 종속인 것
FFD 완전 종속 A,B 둘 다 C, D ,E에 종속

FFD의 조건 : A, B가 릴레이션 R의 속성이고
A -> B 종속성이 성립할 때 B가 A의 속성 전체에 함수 종속하고
부분 집합 속성에 함수 종속하지 않음(위의 거랑 같은 말)

R(A, B, ~) A가 B를 함수적으로 종속을 시킨다. B안에 여러 속성이 존재할 수 있다. 

부분 종속성이 있는 강좌이름 -> 강의실을 뺀다.

출처를 남기기 위해서 기본키 속성인 강좌이름은 놔둔다.
학생번호, 강좌이름이 성적을 종속한다.

부분종속성이 있는 부분을 뺀다. 테이블이 하나로 되어 있는 것을 두 개로 분해한다.
PFD를 제거한다.

수강강좌 릴레이션을 수강 강의실 릴레이션으로 분해

강좌이름->강의실 종속성을 떼서 만든다.

제 3정규형

이행적 종속 여부 판단

제 3정규형 조건 : 릴레이션 R이 제 2정규형을 만족한다.
직접 종속: 기본키가 아닌 속성이 어떤 키에도 비이행적으로 종속
이행성이 없어야 한다. ->

이행적 종속이란 : A->B, B->C -> A->C가 성립되는 함수 종속성을 제거한다.

강좌이름 <- 종속자도 되고 결정자도 되는 이행성을 없앤다 직접 종속

학생번호->강좌이름->수강료일때

학생번호->강좌이름
강좌이름, 수강료 2개의 테이블로 분해함

징검다리로 해도되고 뒤에 껄로 해도됨
업무적의미를 가지고 하기 때문에

BCNF는 제 3정규형이여야한다. Boyce+Codd 논문 쓴 사람이름
결정자가 후보키인 정규형, 결정자는 무조건 후보키가 되어야 함
식별자 속성이 후보키 속성이 아닌 일반 속성에 종속되지 않아야 함

bcnf는 3정규형의 확장판이다.
3정규형이 bcnf가 다 되는 것은 아니다. 3.5정규형 -> bcnf

BCNF 정규형
R에서 X->Y일 때
모든 결정자 X가 슈퍼키이거나 후보키

X와 Y가 있는데 X->Y 함수 종속성이거나
X가 슈퍼키인것

같으면 종속시킴 학생번호 ->

무손실 분해(lossless-join) -> 릴레이션 R을 R1, R2로 나눴다가 조인을 통해 합치더라도
똑같은 이전의 R이 되어야 함

Decomposition분해 

R1과 R2에 같은 속성이 있어야 한다. R1(A, B) R2(A,C)

공통된 속성이 키이면 무손실 분해가 되는 데

특강이름은 중복되는 값이 있으니까 창업전략 처럼  기본키가 아니기 때문에 무손실 분해가 안됨

다시 조인하면 손실 분해가 발생한다.

제4정규형

다치종속성을 갖는 릴레이션
-릴레이션이 BCNF이고 MVD가 없는 경우

X의 값에 대하여, 대응하는 Y값이 여러 개 일때
X->Y X가 Y를 다중값으로 결정한다.
릴레이션은 적어도 3개 속성은 가져야 함
릴레이션 R(A, B, C)에 대해서
A, B 사이에 다치 종속성(MVD)가 존재하면 B와 C는 서로 독립적이여야 한다.

MVD : Multi-valued(One - to Many) Dependency 다치 종속성

4정규형 규칙 - BCNF이여야 한다., 다치종속성MVD를 가지고 있지 않아야 한다.

1번학생이 과목도 Science, Maths 듣고 취미도 Dricket Hockey 여러개이다.
과목하고 취미하고의 연관성이 없어서
BCNF는 된다. 릴레이션은 될 수 있지만 MVD 다치종속성에 문제가 발생한다.

다음 학생테이블을 BCNF로 나타내시오.
1번 학생 science cricket, science hockey, maths cricket, maths hockey <- 이렇게 해야 BCNF를 만족한다.

과목과 취미는 연관성이없다. MVD가 존재하는 나쁜 설계이다.
과목테이블과 취미테이블로 분해한다.

다중값 종속성 : 1정규형에서 비롯됨

고객은 휴대폰과 선호음식 속성을 다중 결정

X는 정확히 하나의 값을 갖는 Y를 결정

휴대폰과 선호음식은 관계가 없기때문에 고객-휴대폰, 고객-선호음식 2개의 테이블로 분리한다.

촬영장소와 장르는 관계가 없기때문에 MVD가 있다면
영화명-촬영, 영화명-장르 테이블로 분리를 한다.

5정규형 : PJ정규형(PJ/NF)
릴레이션을 분해하고 합치는 개념
Project분해, join 합친다.

분해하고 조인했을 때 그 전과 같다면 조인 종속성을 만족
무손실, 가짜튜플이 추가되는 지를 체크, 분해하고 조인했을 때 그 전과 같다면 조인 종속성을 만족

조인종속성이 있을 때 하나의 테이블로 두지말고 분해를 해야한다.

릴레이션 r에 속하는 모든 조인종속이 r의 후보키를 통해서만 만족해야 함

파이A,B : R(A,B,C)에서 A,B 속성만 Project 분해한다.

파이A,B(r) 카티전프로덕트 파이B,C(r)

비부가적조인 -> 가짜 튜블이 존재하지 않는 조인

S P J -> SP PJ SJ로 분해한다음 SP PJ 조인 -> 가짜튜플 발생 BUT 그 결과와 나머지 SJ와 조인하면 원복

SP PJ 조인 -> SPJ 조인했는데 가짜 튜플이 발생한다.

SPJ와 JS 조인 -> 원본 SPJ 가 나온다.

조인을 할때는 후보키말고 기본키를 가지고 조인해야한다. -> 5정규형
```
## 정규화 정리
![image](https://github.com/mr-won/Database-Applications/assets/58906858/0769f330-b190-4bba-be26-34b2aee699e7)

## 23.11.23
#### 트랜잭션, 동시성 제어, 회복
![image](https://github.com/mr-won/Database-Applications/assets/58906858/a3617bca-a474-4342-b631-8866adf01ad0)
```
트랜잭션의 특징 작업의 단위, 되거나 안되거나
동시성 제어 X란 데이터값에 대해서 값을 수정, 변경하는 과정을 동시에 하는 것을 막기 위한 방법
락킹
회복 :특정 작업을 했다가 시스템을 복구하는 방법

트랜직션 : 데이터 검색 또는 READ, WRITE를 할 때 실행되는 논리적 단위
쪼갤 수 없는 업무처리의 단위

트랜잭션(transaction): unit of work
1. BMS에서 데이터를 다루는 논리적인 작업 단위
2. 쪼갤 수 없는 업무처리의 단위

• 데이터베이스에서 트랜잭션을 정의하는 이유
1. 데이터베이스에서 장애가 일어날 때  데이터를 복구하는 작업의 단위
2. DB에서 여러 작업이 동시에 같은 데이터 다룰 때 이 작업을 서로 분리하는 단위가 됨.

트랜잭션은 전체가 수행되거나 또는 전혀 수행되지 않아야 함 (all or nothing) 원자성
트랜직션의 4가지 특징 ACID 서술하라.<- 원자성 일관성, 고립성(트랜직션 실행중일 때는 건들면 안된다.) Durablity(지속성, commit 영속성, 저장되어야만 한다.)

인출 update customer set balance = balance -10000
입금 update customer set balance = balance +10000

commit 부분완료<- 옛날에는 디스크에 써버리고 말았는데, 현재는 성능이 떨어지니까
메모리에만 부분적으로 업데이트하다가 나중에 다되면 묶어서 최종적으로 디스크에 보내는 것을 자동으로 보낸다.

트랜잭션을 종료시킨다. write 시간을 줄일여고 부분완료 시킨다.

쓰기지연 <- 사용자들한테는 빨리 끝난것을 보여주고 디스크에 쓰는 작업을 나중에 한다.

각 계좌에 입금한 값을 저장한다음 부분완료 commit을 한다. 
트랜잭션 종료 알림 방법  ①-②-③-④-COMMIT-⑤-⑥

디스크에 쓰는 작업(버퍼에 내용을 기록하는 것)은 부분완료 commit 이후에 한다.

장점 -> dbms는 사용자에게 빠른 응답성을 보장하기 위해 부분완료를 하는 방법을 선택한다.

begin transaction ~commit main()으로 시작 c
데이터베이스에 저장된 데이터를 다룬다. c는 파일에 저장된 데이터를 다룬다.
번역기는 dbms안에 있는 c에서는 컴파일러
원자성, 일관성, 고립성, 지속성

트랜잭션은 dbms안의 데이터를 다룬다.
프로그램은 컴파일러가 파일에 있는 데이터를 다룬다.

원자성 : 전부 수행되거나 전부 수행되지 않아야 한다. all or nothing
일관성 : 트랜잭션을 수행하기 전이나 수행한 후나 데이터베이스는 항상 일관된 상태를
유지해야 한다.
고립성 : 수행 중인 트랜잭션에 다른 트랜직션이 끼어들어 변경 중인 데이터 값을
훼손하는 일이 없어야 함
지속성 : 수행을 성공적으로 완료한 트랜잭션은 변경한 데이터를 영구히 저장해야 함


원자성 <- 시작했으면 commit으로 끝내야 한다
start transaction 뒤에 select, insert, delete, update를 그룹으로 처리하고 마지막에 commit하면 끝
트랜잭션의 특징을 정의

commit 끝

rollback 트랜잭션 전체 혹은 <savepoint> 까지 무효화 시킴
rollback {to <savepoint>} 그냥 rollback<- 처음으로 savepoint는 트랜잭션 중간 중간의 시점에서 저장하는 데이터를
따로따로 들고 있다.

rollback {To a}
savepoint a <- 복구용

일관성 consistency

a10 b10 에서 시작
a에서 b계좌로 1만원을 보냈다.
보내는 중에 a9 b10 a1만원이 실행 중인 상태가 있을 수 있다.
a9 b11

고립성 isolation

데이터베이스는 공유가 목적 -> 여러 트랜잭션이 동시에 수행됨
독립적으로 수행하는 것을 고립성
동시성 제어 : 고립성을 유지하기 위해 변경 중인 임시 데이터를 다른 트랜잭션이 읽고 쓸 때
제어가 필요함
누가 데이터를 같이 쓰는지 모른다.

동시성 제어의 방법으로 락킹이 있다.

시간 t1에 대해서 트랜잭션이 동시에 발생할 수 있다.

지속성 : 정상적으로 완료 혹은 부분완료한 데이터는 dbms가 책임지고 데이터베이스에 기록한다.

부분완료->메모리에서 작업이 끝난 상태 -> 메모리 버퍼에 있는 내용을 디스크에 옮기는 작업(commit)

부분완료에서 실패되면 작업이 취소된다. aborted

지속성을 책임 -> commit

트랜잭션과 dbms

dbms는 원자성을 유지하기 위해서 recovery manager 회복관리자 프로그램을 실행시킴
로그를 기록해뒀다가 로그를 실행

원자성 : 동시성 제어, 회복
일관성 : 무결성(sql문)
고립성 : 동시성제어
지속성 : 회복

트랜잭션의 시작은 start transaction
트랜잭션 끝 commit/ rollback

set transaction은 트랜직션의 특성을 지정한다.
transaction isolation, access mode, characteristic scope

set [global/session] transaction global, session 트랜잭션 영향의 범위

transaction_characteristic isolation level이 어떤 것이냐 isolation level의 종류
level : 4가지 repeatable read 반복 읽기, read committed, read uncommitted, serializable(가장쌘거) 4가지 4가지가 있는 데 부작용이 있을 수 있다.

access_mode : 2가지 {read write, read only }

8_code01.sql

start transaction
insert into book values(99, '데이터베이스', '한빛', 25000);
select bookname 'bookname1' FROM Book WHERE bookid=99;

savepoint a; a위에 까지를 보관한다. bookname1에 데이터베이스라는 값이 들어가있음

이후에 update 해서 데이터베이스 개론으로 책이름을 바꿈
savepoint a에서는 데이터베이스
savepoint b에서는 데이터베이스 개론

update로 데이터베이스 개론 및 실습으로 고침

savepoint c에서는 데이터베이스 개론 및 실습 메모리에 savepoint랑 데이터를 임시로 저장중

rollback to b; 하면 데이터베이스 개론이 나온다.

rollback to a; 하면 데이터베이스

commit; 하면 최종적으로 데이터베이스로 저장됨

그냥 rollback하면 데이터베이스가 나온다. 처음상태로 이
```
## 23.11.30
```
동시성 제어 : 대부분의 dbms는 다수 사용자
여러 사용자들의 질의나 프로그램 동시 수행 필수
트랜잭션이 동시에 수행될 때 : 일관성을 해치지 않도록 트랜직션의 데이터 접근을 제어하는
DBMS의 기능

여러 사용자나 프로그램들이 동시에 수행되어도 서로 간섭하지 못하도록 제어

트랜잭션이 고립되어 수행한 것과 동일한 결과 산출

concurrency 여러사람이 동시에 사용하면 consistency 일관성이 줄어든다.
concurrency 여러사람이 동시에 사용하지 않으면 consistency 일관성은 높아진다.

concurrency control을 하는 범위를 레코드,파일,db로 할 것인지에 대해 동시성 정도가 달라진다.

직렬 스케줄 (serial schedule)
여러 트랜잭션들의 집합을 한 번에 한 트랜잭션씨 차례대로 수행함 직렬은 동시성이 아님
절차적 수행

비직렬 스케줄 (non-serial schedule)
여러 트랜잭션들을 동시에 수행함

직렬가능(serializable))
비직렬 스케줄의 결과가 어떤 직렬 스케줄의 수행 결과와 동등함

비직렬이 대부분(동시에 수행)-> 결과가 직렬 스케줄의 결과와 동일함
올바른 스케줄이다.
```
![image](https://github.com/mr-won/Database-Applications/assets/58906858/43b2ebf0-4596-4692-aa59-a246e36bad44)
```
Input(X) 연산 : 데이터베이스 항목 X를 포함하고 있는 블록을 주기억장치의 버퍼로
읽어 들임

주기억장치(버퍼 메모리 휘발성)에 쓰는것을 write, read
주기억 장치(버퍼 메모리의 데이터를)데이터베이스에 쓰는 것을 input output
```
![image](https://github.com/mr-won/Database-Applications/assets/58906858/0ff700e3-b8b8-40c4-a860-0e878866f91d)
```
4가지 

1. 갱신 손실(lost update) :수행 중인 트랜잭션이 갱신한 내용을 다른 트랜잭션이 덮어 씀으로써 갱신이 무효가 되는 것

update - update의 문제

2. 오손 데이터 읽기(dirty read) : 읽기 작업을 하는 트랜잭션 A가 작업을 하는 트랜잭
션 B의 중간 데이터를 읽기 때문에 발생하는 문제

완료되지 않은 트랜잭션이 갱신한 데이터를 읽는 것

read - update의 문제

3. 반복할 수 없는 읽기(unrepeatable read) : 트랜잭션 A가 데이터를 읽고 트랜잭션 B가 데이터를 쓰고(Update) 트
랜잭션 A가 다시 한 번 데이터를 읽을 때 생기는 문제

한 트랜잭션이 동일한 데이터를 두 번 읽을 때 서로 다른 값을 읽는 것

업데이트하기 전에 읽은 것이랑 업데이트 한 후에 읽은 것이 다르다.

read - update - read

4. 유령 데이터 읽기(Phantom Data Read)
– 트랜잭션 A가 데이터를 읽고 트랜잭션 B가 데이터를 쓰고(Insert) 트랜
잭션 A가 다시 한 번 데이터를 읽을 때 생기는 문제
– 트랜잭션 A가 읽기 작업을 다시 한 번 반복할 경우 이전에 없던 데이터
(유령데이터)가 나타나는 현상

read - insert - read의 문제 이전에 없던 유령데이터가 나타나는 현상
원래 없던 데이터가 새로 생기는 형태(유령 데이터)
```

``` 
갱신 손실 문제 발생 시나리오 문제를 서술하시오.

갱신손실 두 개의 트랜잭션이 한 개의 데이터를 동시 갱신(update)할 때 발생

데이터베이스에서 절대 발생하면 안 되는 현상

t1은 버퍼의 1000을 900으로 갱신하고 t2는 버퍼의 1000을 가져와서 1100으로 갱신한다음 마지막에 1100으로 갱신한다
```

```
갱신손실을 해결하는 잠금장치(Lock)에 대해서 설명하라.

데이터 수정 중이라는 사실을 알리는 방법이다.
트랜잭션이 데이터를 읽거나 수정할 때 데이터에 표시하는 잠금 장치

db내의 각 데이터 항목과 연관된 하나의 변수

t1이 데이터를 읽고 수정한다음 쓰기 동안에 t2 트랜잭션이 버퍼의 데이터를 읽어갈 수 없게 데이터x에 대해서 lock(x)로 데이터를 락킹함

t1이 데이터를 수정하고 쓰면 unlock(x)로 데이터를 언락하고 그다음 t1이 데이터를 읽어 갈 수 있도록 한다.

트랜잭션t1, t2중에 어떤 것을 먼저할지 결정하는 스케줄에 따라서 값이 달라짐

t1다하고 t2다하면 동시성이 없어지는 것임 

락의 유형 두 가지에 대해서 설명하라.

1. 공유락(LS, shared lock)
트랜잭션이 읽기를 할 때 사용하는 락 read - only lock
2. 배타락(LX, exclusive lock)
트랜잭션이 읽고 쓰기를 할 때 사용하는 락
```








