[![GitHub watchers](https://img.shields.io/github/watchers/nyctophile07/elib.io?style=social&label=Watch&maxAge=2592000)](https://GitHub.com/nyctophile07/elib.io/watchers/)
[![GitHub forks](https://img.shields.io/github/forks/nyctophile07/elib.io?style=social&label=Fork&maxAge=2592000)](https://GitHub.com/nyctophile07/elib.io/network/)
[![GitHub stars](https://img.shields.io/github/stars/nyctophile07/elib.io?style=social&label=Star&maxAge=2592000)](https://GitHub.com/nyctophile07/elib.io/stargazers/)

<div align="center"> 

<img src="markdown/elibray.png" alt="book" width=40%>

# **eLibrary - A digital space among readers** 
Currently Available on [**https://elib.rf.gd**](https://elib.rf.gd)

</div>


## **Table of Content**
- [Overview](#Overview)
- What is the Purpose ?
- Development Process
- Dataflow Diagram
- ER Diagram
- Control Center ( Administration)
- Getting Started as a user
- Future Scopes

## Overview
E-Library is a web application which is a digital version of conventional libraries. Unlike conventional libraries, which are bound by physical constraints and operating hours, the E-Library offers unparalleled convenience and flexibility. Users can seamlessly navigate through a vast collection of e-books, articles, research papers, from any location with internet connectivity, at any time of the day. 

## What is the purpose ?
The purpose of the E-Library website is to serve as a digital hub for readers and learners, offering a wide range of e-books, articles, and resources. It’s designed to be a convenient and accessible platform for exploring diverse genres, engaging in discussions, and joining a community passionate about reading and learning.

The site aims to blend literature and information in the digital era, providing a gateway to expand horizons with every click. It’s a collaborative creation by students from the ITM department at Ravenshaw University, fostering a love for reading and learning.

## Development Process

```mermaid
graph LR
A[UI/UX DESIGN]--> B(FRONT END)--> C(BACK END)--> D(DATABASE IMPLEMENTATION)
```

Our Develop Process involved four stages: UI/UX design, front-end development, back-end development, and database implementation. It all started with creating the overall structural design of the website ensuring an attractive user interface and smooth navigation.<br>
Next, Front-end Developers bring that design to life. Back-end Developers handle the website's functionalities. Finally, the database is implemented to interact with realtime users via web services.

<img src="markdown/Picture5.png" alt="langs" width="100%">

<div align="center"> 

## Data Flow Diagram (DFD)
<img src="markdown/Picture8.png" alt="DFD" width="100%">

</div>

## ER Diagram

The ER diagram for the eLibrary illustrates the relationships between essential tables, including admin, user, books, bookrequest, and feedback report. These tables are interconnected through specific types of relationships.

```mermaid
graph LR
b-->j{Request}-->c(Book Request)-->i{Manage}-->a
a(Admin) --> f{add / delete} --> e(Books)
a(Admin) --> g{Terminate / view} -->b
b(User) --> h{ Search / Download } --> e
b-->k{Submit}-->d(feedback Report)-->l{View}-->a
```

## Control Center (Administrative Panel)

- **Book Management:** Administrators can add books to the library based on user requests or to expand the collection.
- **Request Review:** They are responsible for reviewing and managing request / submissions from readers.
- **Information Accuracy:** Ensuring that the information provided for book additions is accurate to prevent future inconvenience.
- **User Feedback:** Considering feedback from users to improve the library’s services, such as expanding the book collection and enhancing visual appeal.

```mermaid

graph LR
a(Admin) --> b{Log In} --> c(Admin Panel)
c-->d((Add / Delete Books))
c-->e((Terminate / View User))
c-->f((View Feedback))
c-->g((Manage Request / Submissions))

```

<div align="center"> 

## Getting Started as User
<img src="markdown/Picture8.png" alt="DFD" width="100%">

</div>

