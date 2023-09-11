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





```
