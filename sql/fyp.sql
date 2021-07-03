-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2021 at 01:11 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` varchar(255) NOT NULL,
  `uID` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `questions` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `uID`, `title`, `questions`, `subject`) VALUES
('5fc85721cc705', 5, 'SEMA310', '44 50 47 46 ', 'Programming'),
('5fc8575559246', 5, 'MIDTERM A201', '49 48 26 45 43 44 46', 'Programming'),
('5fcdad0dd8200', 5, 'DATABASE_A120', '57  60 52 56 59 58 54 55 53 ', 'Database'),
('5fcdad943e5c1', 5, 'DATABASE_A211', '56 59 58 62 61 54 55 57 ', 'Database'),
('5fce3e3e4842d', 5, 'Security_A118', '34  75 74 78 77 ', 'Security'),
('5fce433365e9b', 5, 'Security_A301', '75 74 34 78 80  77 79 76 33 ', 'Security'),
('602120bb5b2d4', 29, 'a test', '106 ', 'Mathematics'),
('60212a10dfeca', 29, 'Network_A211', '30 31 29 ', 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `q_list`
--

CREATE TABLE `q_list` (
  `q_id` int(100) NOT NULL,
  `u_id` int(11) NOT NULL DEFAULT '0',
  `question` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `answer` varchar(1024) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `q_list`
--

INSERT INTO `q_list` (`q_id`, `u_id`, `question`, `subject`, `chapter`, `answer`) VALUES
(12, 5, 'What is etc full spelling', 'English', '4', 'Et cetera'),
(29, 5, 'The IETF standards documents are called ________', 'Networking', '1', 'RFC. It stands for Request For Comments and they are documents that describe methods, behaviors, research, or innovations applicable to the working of the Internet.'),
(30, 5, ' In the layer hierarchy as the data packet moves from the upper to the lower layers, headers are ___________', 'Networking', '2', 'Added.  Each layer adds its own header to the packet from the previous layer. For example, in the Internet layer, the IP header is added over the TCP header on the data packet that came from the transport layer.'),
(31, 5, 'Communication between a computer and a keyboard involves ', 'Networking', '1', ' In simplex transmission, data flows in single direction which in this case refers to the data flowing from the keyboard to the computer. Another example would be of the mouse where the data flows from the mouse to the computer only.'),
(34, 5, 'Define Cryptography.', 'Security', '1', 'It is a technique used to protect information from third parties called adversaries. Cryptography allows the sender and recipient of a message to read its details.'),
(46, 5, 'What do you understand by machine code?', 'Programming', '3', 'Machine code is a low-level programming language. Unlike high-level programming languages that come with a compiler to transform high-level code into machine code for execution, a microprocessor directly processes machine code without doing such a transformation.'),
(48, 5, 'Can you enumerate some coding best practices?', 'Programming', '3', 'Abide by the DRY principle\r\nFollow some easy-to-remember naming convention\r\nKeep the code as straightforward as possible\r\nLimit the length of a line of code\r\nUse comments frequently\r\nUse consistent indentation\r\nWhenever and wherever possible, avoid deep nesting'),
(50, 5, 'What are the violations of the DRY principle called? Where are they found typically?', 'Programming', '5', 'They are termed WET solutions. Although WET typically stands for Write Everything Twice, in some cases it might also mean We Enjoy Typing or Waste Everyone’s Time. WET solutions are usually adopted in multi-tiered architectures.'),
(53, 0, 'What is DBMS?', 'Database', '1', 'Database Management Systems (DBMS) are applications designed especially which enable user interaction with other applications.'),
(54, 0, 'Segregate database technology\'s development.', 'Database', '2', 'The development of database technology is divided into:\r\n\r\nStructure or data model\r\nNavigational model\r\nSQL/ relational model'),
(55, 0, 'What are the features of Database language?', 'Database', '1', 'A database language may also incorporate features like:\r\nDBMS-specific Configuration and management of storage engine\r\nComputations to modification of query results by computations, like summing, counting, averaging, grouping, sorting and cross-referencing Constraint enforcement Application Programming Interface'),
(56, 0, 'Define database model.', 'Database', '1', 'A data model determining fundamentally how data can be stored, manipulated and organised and the structure of the database logically is called database model.'),
(57, 0, 'What is SQL?', 'Database', '2', 'Structured Query Language (SQL) being ANSI standard language updates database and commands for accessing.'),
(58, 0, 'Define Normalization.', 'Database', '3', 'Organized data void of inconsistent dependency and redundancy within a database is called normalization.'),
(59, 0, 'Define DDL and DML.', 'Database', '4', 'Managing properties and attributes of database is called Data Definition Language(DDL).\r\n\r\nManipulating data in a database such as inserting, updating, deleting is defined as Data Manipulation Language. (DML)'),
(60, 0, 'Define cursor.', 'Database', '5', 'A database object which helps in manipulating data row by row representing a result set is called cursor.'),
(61, 0, 'Enlist the cursor types.', 'Database', '6', 'They are:\r\n\r\nDynamic: it reflects changes while scrolling.\r\nStatic: doesn\'t reflect changes while scrolling and works on recording of snapshot.\r\nKeyset: data modification without reflection of new data is seen.'),
(62, 0, 'Define sub-query.', 'Database', '8', 'A query contained by a query is called Sub-query.'),
(71, 0, 'What are the elements of cybersecurity?', 'Security', '2', 'Major elements of cybersecurity are:\r\n\r\nInformation security\r\nNetwork security\r\nOperational security\r\nApplication security\r\nEnd-user education\r\nBusiness continuity planning'),
(74, 0, 'Benefits of Cyber Security', 'Security', '2', 'Benefits of cyber security are as follows:\r\n\r\nIt protects the business against ransomware, malware, social engineering, and phishing.\r\nIt protects end-users.\r\nIt gives good protection for both data as well as networks.\r\nIncrease recovery time after a breach.\r\nCybersecurity prevents unauthorized users.'),
(75, 0, ' What is CIA?', 'Security', '3', 'Confidentiality, Integrity, and Availability (CIA) is a popular model which is designed to develop a security policy. CIA model consists of three concepts:\r\n\r\nConfidentiality: Ensure the sensitive data is accessed only by an authorized user.\r\nIntegrity: Integrity means the information is in the right format.\r\nAvailability: Ensure the data and resources are available for users who need them'),
(76, 0, 'What is a Firewall?', 'Security', '1', 'It is a security system designed for the network. A firewall is set on the boundaries of any system or network which monitors and controls network traffic. Firewalls are mostly used to protect the system or network from malware, worms, and viruses. Firewalls can also prevent content filtering and remote access'),
(77, 0, 'Explain Traceroute', 'Security', '4', 'It is a tool that shows the packet path. It lists all the points that the packet passes through. Traceroute is used mostly when the packet does not reach the destination. Traceroute is used to check where the connection breaks or stops or to identify the failure'),
(78, 0, 'Explain SSL', 'Security', '4', 'SSL stands for Secure Sockets Layer. It is a technology creating encrypted connections between a web server and a web browser. It is used to protect the information in online transactions and digital payments to maintain data privacy.'),
(79, 0, 'What do you mean by data leakage?', 'Security', '1', 'Data leakage is an unauthorized transfer of data to the outside world. Data leakage occurs via email, optical media, laptops, and USB keys.'),
(80, 0, 'Explain the brute force attack. How to prevent it?', 'Security', '3', 'It is a trial-and-error method to find out the right password or PIN. Hackers repetitively try all the combinations of credentials. In many cases, brute force attacks are automated where the software automatically works to login with credentials. There are ways to prevent Brute Force attacks. They are:\r\n\r\nSetting password length.\r\nIncrease password complexity.\r\nSet limit on login failures.'),
(81, 0, 'What is port scanning?', 'Security', '4', 'It is the technique for identifying open ports and service available on a specific host. Hackers use port scanning technique to find information for malicious purposes.'),
(106, 29, 'What is 1+1?', 'Mathematics', '1', 'The answer is 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

CREATE TABLE `tbl_uploads` (
  `file_id` int(10) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` blob NOT NULL,
  `size` int(11) NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`file_id`, `filename`, `type`, `size`, `content`, `tag`) VALUES
(17, 'FST THESIS GUIDELINES Rubric.pdf', 0x6170706c69636174696f6e2f706466, 462451, '  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP1.1-Integrity Evaluation Rubric (LO4): Coordinator \r\n \r\n   \r\n \r\n \r\n \r\n \r\n \r\nFYP I : INTEGRITY EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\n \r\nAttribute: Ethics and Professionalism \r\n \r\nSub-attribute Very Weak \r\n(1-2) \r\nWeak \r\n(3-4) \r\nSatisfy \r\n(5-6) \r\nGood \r\n(7-8) \r\nVery Good \r\n(9-10) \r\nMarks \r\nWork Ethics: \r\nWorking culture behavior \r\nPunctuality \r\nEfficiency \r\nProductivity \r\nVery poor \r\nworking culture and \r\nsubmit documents  \r\nwithout  supervisor \r\nconsent \r\nPoor working culture and \r\nsubmit documents  \r\nwithout  supervisor \r\nconsent \r\nModerate working culture \r\nand/or submit documents  \r\nwith supervisor consent \r\nGood working culture \r\nand submit documents  \r\nwith supervisor consent \r\nExcellent \r\nworking culture  \r\nand submit documents  with \r\nsupervisor consent. \r\n \r\nIntegrity \r\nPerform a task with \r\nlack of trust, honesty, \r\nsincerity and \r\ntransparency \r\nPerform a task with \r\nlimited trust, honesty, \r\nsincerity and transparency \r\nPerform a task with \r\nacceptable trust, honesty, \r\nsincerity and \r\ntransparency \r\nPerform a task with trust, \r\nhonesty, sincerity and \r\ntransparent in most \r\nsituations \r\nAlways perform a task with \r\ntrust, honesty, sincerity and \r\ntransparent in any situation \r\n \r\nSimilarity Index 30% similarity index \r\nfrom turnitin report. \r\nLess than 30% similarity \r\nindex from turnitin report. \r\nLess than 20% similarity \r\nindex from turnitin report \r\nLess than 10% similarity \r\nindex from turnitin \r\nreport. \r\nLess than 5% similarity \r\nindex from turnitin report. \r\n \r\nPunctuality and completeness \r\nDocument submission  \r\n1. Thesis topic registration form \r\n2. Student-SV meeting form \r\n3. Thesis proposal \r\nSubmitted late by 4 or \r\nmore days Submitted 3 days late Submitted 2 days late Submitted 1 day late Submitted on time with \r\ncompleted documentation \r\n \r\n     \r\nTOTAL \r\n/40 \r\n \r\n/10% \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP1.2-Verbal Communication Skill & Content Evaluation Rubric (LO5): Evaluator  \r\n \r\n \r\n \r\n \r\n \r\nFYP I : RESEARCH PROPOSAL PRESENTATION EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute: Verbal Communication (LO5) \r\n \r\nSub-attribute \r\n \r\n1 - 2 \r\nVery Weak \r\n3 - 4  \r\nWeak \r\n5 - 6 \r\nFair \r\n7 - 8 \r\nGood \r\n9 - 10 \r\nVery Good \r\nScore \r\nClear delivery of \r\nideas  \r\n \r\nNot able to deliver ideas \r\nclearly and require major \r\nimprovements. \r\nAble to deliver ideas and \r\nrequire further improvements. \r\nAble to deliver ideas clearly \r\nand require minor \r\nimprovements. \r\nAble to deliver ideas clearly. Able to deliver ideas with \r\ngreat clarity.  \r\nBody language \r\n \r\nDoes not look at audience; \r\nreads notes. \r\nFidgets or slouches a lot. \r\nMakes some eye contact but \r\nreads notes or slides most of \r\nthe time. \r\nMakes some eye contact but \r\nreads notes or slides \r\noccasionally. \r\nKeeps eye contact with \r\naudience most of the time; \r\nonly glances at notes or \r\nslides. Has confident posture. \r\nKeeps eye contact with \r\naudience most of the time \r\nwith great confidence \r\n \r\nVoice \r\n\r\nconsistently too weak or \r\ntoo strong. \r\nspace is \r\nconsistently too slow or \r\ntoo fast. \r\n\r\nfrequently too weak or too \r\nstrong. \r\n\r\noften too slow or too fast. \r\n\r\ngenerally steady, strong \r\nand clear. \r\n\r\nappropriate. \r\nvoice is steady, \r\nstrong and clear. \r\n\r\nmostly appropriate. \r\n\r\nconfident, steady, strong \r\nand clear. \r\n\r\nconsistently appropriate. \r\n \r\nVisual tools \r\nVisual aids demonstrate no \r\ncreativity or clarity and are \r\noften difficult to read \r\nPresentation is weak \r\nVisual aids have limited \r\ncreativity or clarity or are \r\nsometimes difficult to read. \r\nPresentation is not enhanced \r\nby the visual tools. \r\nVisual aids are reasonably \r\ncreative, clear and easy to \r\nread. \r\nPresentation is sometimes \r\nenhanced. \r\nVisual aids are usually \r\ncreative, clear and easy to \r\nread. \r\nPresentation is often \r\nenhanced by the visual tools. \r\nVisual aids are very creative, \r\nclear and easy to read. \r\nPresentation is consistently \r\nenhanced by the visual tools. \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nUnderstand and \r\nrespond to \r\nquestions \r\n \r\nNot able to understand and \r\nrespond to a question \r\nAble to understand and \r\nanswer questions but not able \r\nto accurately answer the \r\nquestion \r\nAble to understand and \r\nanswer questions \r\nsatisfactorily \r\nAble to respond to questions \r\nwell \r\nAble to fully understand and \r\nrespond to questions very \r\nwell \r\n \r\nTOTAL (A)  / 50 \r\n/30% \r\n \r\n Slide Content \r\n \r\nCriteria  1 - 4 \r\nWeak \r\n5 - 7 \r\nFair \r\n8 - 10 \r\nGood Score \r\nTitle \r\nTitle  is  incorrect  and  not  reflects  the  content  of \r\nresearch. \r\n \r\nTitle is less accurate and less reflects the content of \r\nresearch. Title is concise and reflects the content of research.  \r\nObjective and \r\nScope \r\nObjective or scope is not explained. \r\n \r\nObjectives and scope are less clear and less realistic. Objective and scope are clear and realistic.  \r\nProblem \r\nStatement Problem statement is not related to the research title. Problem statement is not clearly stated. Problem statement is significant and described \r\nclearly.  \r\nLiterature \r\nReview \r\n The related literature work is insufficient. The related literature work is sufficient but not \r\nclearly explained \r\nA lot of related literature work have been found and \r\nclearly explained.  \r\nMethodology The methodology is unclear. The methodology is acceptable and quite \r\nsystematic. \r\nThe methodology is correct, systematic and well \r\ndescribed.  \r\nExpected \r\nResearch Results Expected research results are explained but \r\ninsufficient and not significant to the work. \r\nExpected research results are explained but not \r\nsignificant to the work \r\nExpected research results are significant to the work \r\nand can contribute to the advancement of \r\nknowledge.  \r\nWork Planning Gantt charts and milestones are not stated. Gantt charts and milestones are stated but \r\nincompatible with work. \r\nGantt charts and milestones are stated and \r\nappropriate to the work.  \r\nReferences Reference is not written consistently and not in \r\naccordance with the format. \r\nReferences are not up to date, not appropriate and \r\ndo not support the content \r\nAppropriate references, current and supports the \r\ncontent  \r\nTOTAL (B) / 80 \r\n/10% \r\nTOTAL A+B /40% \r\n \r\n       \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP1.3-Written Communication Skills & Content Evaluation Rubric (LO5): SV & Evaluator                  \r\n                    \r\n \r\n \r\n \r\n \r\nFYP I: WRITTEN RESEARCH PROPOSAL EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute:  Written Communication \r\n \r\nSub-attribute  \r\n \r\n1 - 2 \r\nVery Weak \r\n3 - 4  \r\nWeak \r\n5 - 6 \r\nFair \r\n7 - 8 \r\nGood \r\n9 - 10 \r\nVery Good \r\nScore \r\nGrammar Usage \r\nand Spelling \r\n \r\n \r\nVery distracting errors in \r\ngrammar, punctuation, \r\nspelling and inaccurate \r\nscientific symbols and \r\nword usage. \r\nMany errors in grammar, \r\nspelling, punctuation, and \r\nless accurate scientific \r\nsymbols, and word usage. \r\nModerate errors in \r\ngrammar, spelling, \r\npunctuation, and accurate \r\nscientific symbols, and \r\nword usage. \r\nFew grammatical errors, \r\nspelling and accurate use \r\nof punctuation, and \r\nscientific symbols, and \r\nword usage. \r\nFree of grammatical errors, \r\ndistracting spelling and \r\nvery accurate use of \r\npunctuation, scientific \r\nsymbols, and word usage. \r\n \r\nOrganization/ \r\nStructural \r\nDevelopment of the \r\nIdea \r\nNo evidence of structure or \r\norganizations \r\nParagraph development \r\npresent but not perfected \r\nLogical organizations of \r\nideas and partially \r\ndeveloped \r\nLogical organizations of \r\nideas and fully developed \r\nDemonstrates logical and \r\nfluent sequencing of ideas \r\nthrough well-developed \r\nparagraphs  \r\n \r\nSystematically \r\nwritten academic \r\ndiscourse \r\n \r\nNot able to write ideas \r\nsystematically \r\nAble to write ideas with \r\nlimited system and require \r\nfurther improvements \r\nAble to write ideas fairly \r\nsystematically but require \r\nminor improvements \r\nAble to write ideas \r\nsystematically \r\nExcellent ability to write \r\nideas systematically  \r\nTOTAL (A)  / 30 \r\n/10% \r\n \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\n \r\nProposal Content \r\n \r\nCriteria  \r\n \r\n1 - 4 \r\nWeak \r\n5 - 7 \r\nFair \r\n8 - 10 \r\nGood Score \r\nTitle Title is incorrect and not reflects the \r\ncontent of research. \r\nTitle is less accurate and less reflects the \r\ncontent of research. \r\nTitle is concise and reflects the content of \r\nresearch.  \r\nObjective and Scope Objective or scope is not explained. Objectives and scope are less clear and \r\nless realistic. \r\nObjective and scope are clear and \r\nrealistic.  \r\nProblem Statement Problem statement is not related to the \r\nresearch title. Problem statement is not clearly stated. Problem statement is significant and \r\ndescribed clearly.  \r\nLiterature Review \r\n The related literature work is insufficient. The related literature work is sufficient \r\nbut not clearly explained \r\nA lot of related literature work have been \r\nfound and clearly explained.  \r\nMethodology The methodology is unclear. The methodology is acceptable and quite \r\nsystematic. \r\nThe methodology is correct, systematic \r\nand well described.  \r\nExpected Research \r\nResults \r\nExpected research results are explained \r\nbut insufficient and not significant to the \r\nwork. \r\nExpected research results are explained \r\nbut not significant to the work \r\nExpected research results are significant \r\nto the work and can contribute to the \r\nadvancement of knowledge. \r\n \r\nWork Planning Gantt charts and milestones are not \r\nstated. \r\nGantt charts and milestones are stated but \r\nincompatible with work. \r\nGantt charts and milestones are stated \r\nand appropriate to the work.  \r\nReferences Reference is not written consistently and \r\nnot in accordance with the format. \r\nReferences are not up to date, not \r\nappropriate and do not support the \r\ncontent. \r\nAppropriate references, current and \r\nsupports the content.  \r\nTOTAL (B) / 80 \r\n/20% \r\nTOTAL A+B /30% \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP1.4-Information Retrieve Evaluation Rubric (LO7): SV \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nFYP I: WRITTEN RESEARCH PROPOSAL EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\n \r\nAttribute: Information Retrieve \r\n \r\nSub-attribute Very Weak \r\n(1-2) \r\nWeak \r\n(3-4) \r\nSatisfy \r\n(5-6) \r\nGood \r\n(7-8) \r\nVery Good \r\n(9-10) \r\nScore \r\n Initiative  Explores only at \r\nsurface level, \r\nproviding little \r\ninsight beyond \r\nbasic facts, \r\nindicating low \r\nsubject interest.  \r\n \r\nExplores topic with low \r\napparent evidence of \r\ndepth, providing only \r\noccasional insight; \r\nindicates mild interest in \r\ntopic/subject.  \r\nExplores topic with \r\nmoderate apparent depth, \r\nyielding multiple insights. \r\nLacks clear \r\ncomprehension of topic.  \r\nExplores topic with depth \r\nof interest, revealing \r\nsignificant insights of \r\nknowledge. Lacks \r\ncomplete comprehension \r\nof subject.  \r\nExplores topic with great \r\ndepth of interest; reveals \r\nsignificant insights of \r\nknowledge/information. \r\nDemonstrates strong \r\ncomprehension of \r\nsubject.  \r\n \r\nIndependence  Begins to look beyond \r\nclassroom requirements, \r\nshowing interest in \r\npursuing knowledge \r\nindependently. \r\nExplores knowledge \r\nbeyond classroom, \r\nshowing interest in \r\nindependent learning \r\nexperiences.  \r\nEvidence of some \r\nknowledge exploration \r\noutside class \r\nenvironment; pursues \r\nshort-term independent \r\nlearning opportunity.  \r\nEvidence of substantial \r\nknowledge gained outside \r\nclass environment; shows \r\nstrong interest in \r\nextended independent \r\nlearning opportunities.  \r\nKnowledge pursuits \r\nbeyond class are \r\nsignificant and well \r\ndefined. Engages in \r\nextended independent \r\nlearning opportunity \r\noutside of curricular \r\ncompletion.  \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nApplication/  \r\nTransfer  \r\nMakes vague reference to \r\nprevious learning but \r\ndoes not apply knowledge \r\nto performance in \r\nproblem-solving \r\nsimulations/situations. \r\nMakes defined reference \r\nto previously gained \r\nknowledge but does not \r\napply to problem solving.  \r\nMakes defined reference \r\nto gathered previous \r\nknowledge and \r\ndemonstrates limited \r\ncapacity to utilize in \r\nproblem-solving/novel \r\nsituations.  \r\nDemonstrates reference \r\nto previously gained \r\nknowledge and \r\ndemonstrates strong \r\napplication to solving of \r\nnovel problems.  \r\nMakes explicit reference \r\nto previous knowledge \r\nand applies these skills to \r\nsolving of problem in \r\nnovel and creative \r\nmethods/manners.  \r\n \r\nReflection  Reviews prior learning at \r\na surface level, but \r\nwithout clarified meaning \r\nor indicating a broader \r\nperspective about \r\neducational or life events. \r\nReviews prior learning \r\nwith limited capacity, \r\ngiving minor clarification \r\nor broad perspective.  \r\nReviews prior learning \r\nand shows clarification or \r\nbroad perspective about \r\neducational or life events.  \r\nReviews prior learning in \r\nsome depth, revealing \r\nclear meaning and \r\nindicating broad \r\nperspectives related to \r\neducational events.  \r\nReviews prior learning in \r\ndepth to reveal \r\nsignificantly changed \r\nperspectives about \r\neducational and life \r\nexperiences.  \r\n \r\nTOTAL /40 \r\n/20% \r\n \r\n \r\nReference: Rhodes, Terrel, ed. 2010. Assessing Outcomes and Improving Achievement: Tips and Tools for Using Rubrics. Washington, DC: Association of American Colleges and \r\nUniversities. \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP2.1-Integrity and Ethics Evaluation Rubric (LO4): Coordinator \r\n \r\n \r\n \r\n \r\n \r\n \r\n  \r\nFYP I : INTEGRITY & ETHICS EVALUATION FORM \r\n \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute: Ethics and Professionalism \r\n \r\nSub-attribute Very Weak \r\n(1-2) \r\nWeak \r\n(3-4) \r\nSatisfy \r\n(5-6) \r\nGood \r\n(7-8) \r\nVery Good \r\n(9-10) \r\nMarks \r\nPunctuality and completeness \r\nDocument submission  \r\n4. Softbound Thesis \r\n5. Student-SV meeting \r\nform \r\nSubmitted late by \r\n4 or more days Submitted 3 days late Submitted 2 days late Submitted 1 day late Submitted on time with \r\ncompleted documentation \r\n \r\nFinal  \r\nDocument submission  \r\n1. Hardbound Thesis \r\n2. Thesis submission form \r\n3. Student-SV meeting \r\nform \r\nSubmitted late by \r\n4 or more days Submitted 3 days late Submitted 2 days late Submitted 1 day late Submitted on time with \r\ncompleted documentation \r\n \r\nSoftcopy Submission  \r\nFull thesis in PDF format via \r\nGOALS \r\nSubmitted late by \r\n4 or more days Submitted 3 days late Submitted 2 days late Submitted 1 day late Submitted on time with \r\ncompleted documentation \r\n \r\n     TOTAL /30 \r\n \r\n/10% \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP2.2-Plagiarism Rubric (LO4): SV \r\n \r\n \r\n \r\n \r\nFYP II : ETHICS AND PLAGIARISM EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute: Ethics and Plagiarism  \r\nCriteria  Very Weak \r\n(1-2) \r\nWeak \r\n(3-4) \r\nSatisfy \r\n(5-6) \r\nGood \r\n(7-8) \r\nVery Good \r\n(9-10) \r\nScore \r\nAttendance for \r\nsupervision \r\nmeeting \r\nVery poor attendance \r\nand/or is frequently late (1 \r\nmeeting only) \r\nPoor attendance and/or is \r\nfrequently late (2 meetings \r\nonly). \r\nSome absences and/or is \r\nnot always on time (3-4 \r\nmeetings). \r\nMostly consistent \r\nattendance and usually on \r\ntime (5-6 meetings). \r\nConsistent attendance and \r\npunctual (>6 meetings). \r\n \r\nCiting references  Not able to cite references  Able to cite references but \r\nusing irrelevant sources. \r\nAble to cite references \r\nusing sufficient sources. \r\nAble to cite references \r\nusing complete sources \r\nAble to cite references \r\nusing complete and \r\naccurate sources. \r\n \r\nRephrasing \r\nsentences Unable to rephrase \r\ninformation  \r\nAble to rephrase only few \r\nof the information  \r\nAble to rephrase some of \r\nthe information \r\nAble to rephrase most of \r\nthe information  \r\nAble to rephrase all the \r\ninformation completely. \r\n \r\nWork/report \r\nwriting  \r\nCopying other people\'s \r\nwork without any \r\nalteration \r\nCopying other people\'s \r\nwork with minimal \r\nalteration. \r\nAble to write his/her work \r\nsufficiently with minimal \r\nanalysis. \r\nAble to write his/her work \r\nsufficiently with adequate \r\nanalysis. \r\nAble to write his/her work \r\nwith complete analysis. \r\n \r\nSimilarity Index  30% and more similarity \r\nindex from turnitin report. \r\nLess than 30% similarity \r\nindex from turnitin report. \r\nLess than 20% similarity \r\nindex from turnitin report \r\nLess than 10% similarity \r\nindex from turnitin report. \r\nLess than 5% similarity \r\nindex from turnitin report. \r\n \r\nTOTAL /50 \r\n/10% \r\n                                                                                                                                       \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\n                                                                                                                                                                    FYP2.3-Verbal/Written Communication & Content Evaluation Rubric (LO5): Evaluator  \r\n \r\n \r\n \r\n \r\n \r\n  \r\nFYP II: FINAL PRESENTATION EVALUATION FORM \r\n \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute: Verbal Communication (LO5) \r\n \r\nSub-attribute \r\n \r\n1 - 2 \r\nVery Weak \r\n3 - 4  \r\nWeak \r\n5 - 6 \r\nFair \r\n7 - 8 \r\nGood \r\n9 - 10 \r\nVery Good \r\nScore \r\nClear delivery of \r\nideas  \r\n \r\nNot able to deliver ideas \r\nclearly and require major \r\nimprovements. \r\nAble to deliver ideas and \r\nrequire further \r\nimprovements. \r\nAble to deliver ideas \r\nclearly and require minor \r\nimprovements. \r\nAble to deliver ideas \r\nclearly. \r\nAble to deliver ideas with \r\ngreat clarity.  \r\nBody language \r\n \r\nDoes not look at audience; \r\nreads notes. \r\nFidgets or slouches a lot. \r\nMakes some eye contact \r\nbut reads notes or slides \r\nmost of the time. \r\nMakes some eye contact \r\nbut reads notes or slides \r\noccasionally. \r\nKeeps eye contact with \r\naudience most of the time; \r\nonly glances at notes or \r\nslides. \r\nHas confident posture. \r\nKeeps eye contact with \r\naudience most of the time \r\nwith great confidence \r\n \r\nVoice \r\n\r\nconsistently too weak or \r\ntoo strong. \r\n\r\nconsistently too slow or too \r\nfast. \r\n\r\nfrequently too weak or too \r\nstrong. \r\n\r\noften too slow or too fast. \r\n\r\ngenerally steady, strong \r\nand clear. \r\n\r\nappropriate. \r\n\r\nstrong and clear. \r\n\r\nmostly appropriate. \r\n\r\nconfident, steady, strong \r\nand clear. \r\n\r\nconsistently appropriate. \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nVisual tools \r\nVisual aids demonstrate no \r\ncreativity or clarity and are \r\noften difficult to read \r\nPresentation is weak \r\nVisual aids have limited \r\ncreativity or clarity or are \r\nsometimes difficult to read. \r\nPresentation is not \r\nenhanced by the visual \r\ntools. \r\nVisual aids are reasonably \r\ncreative, clear and easy to \r\nread. \r\nPresentation is sometimes \r\nenhanced. \r\nVisual aids are usually \r\ncreative, clear and easy to \r\nread. \r\nPresentation is often \r\nenhanced by the visual \r\ntools. \r\nVisual aids are very \r\ncreative, clear and easy to \r\nread. \r\nPresentation is consistently \r\nenhanced by the visual \r\ntools. \r\n \r\nUnderstand and \r\nrespond to \r\nquestions \r\n \r\nNot able to understand and \r\nrespond to a question \r\nAble to understand and \r\nanswer questions but not \r\nable to accurately answer \r\nthe question \r\nAble to understand and \r\nanswer questions \r\nsatisfactorily \r\nAble to respond to \r\nquestions well \r\nAble to fully understand \r\nand respond to questions \r\nvery well \r\n \r\nTOTAL  / 50 \r\n/20% \r\n \r\nPoster Content \r\n \r\nCriteria  \r\n \r\n1 - 4 \r\nWeak \r\n5 - 7 \r\nFair \r\n8 - 10 \r\nGood \r\nScore \r\nIntroduction \r\nThe poster clearly introduces the background \r\nand purpose of the research. \r\nThe poster clearly introduces the background \r\nhowever the purpose of the research is not \r\nclearly presented. \r\nThe poster does not introduce the \r\nbackground and purpose of the \r\nresearch. \r\n \r\nMethodology \r\nProvides no outline of the methods or resources \r\nused. \r\nOutlines the methods or resources used to study \r\nthe subject of the investigation but is \r\ndisorganized. Uses unrelated or confusing \r\nfigure. \r\nOutlines the methods in an \r\norganized, specific and concise \r\nmanner. Figure(s) are included to aid \r\nin describing methods used. \r\n \r\n \r\nResults Analysis and \r\nDiscussion \r\nInsufficient analysis. Discussion is not related to \r\nresults \r\nSufficient but few inaccurate analyses. \r\nDiscussion is related to results. \r\nSufficient and accurate analysis. \r\nDetailed discussion and related to \r\nresults. \r\n \r\nConclusion, \r\nRecommendation \r\nand References \r\nInsufficient summary. No recommendations for \r\nfuture works. No relevant references. \r\nSufficient summarization of project \r\nachievements. Acceptable recommendations for \r\nfuture works.  Few number of relevant \r\nreferences. \r\nClear and complete summarization of \r\nproject achievements. Clear and \r\nrealistic recommendations for future \r\nworks. Relevant references. \r\n \r\nPoster Organization \r\nSloppy poster. Too wordy. Inappropriate colour \r\nand figure usage. \r\nA good poster. Text and graphic is well \r\nbalanced. Some misspelled words and terms \r\nWell-organized poster. Explanation \r\nis clear and highly convincing. \r\nExcellent usage of colour, text and \r\ngraphics. No typo. \r\n \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nTOTAL / 50 \r\n/15% \r\nTotal A+B /35% \r\nRecommendation for top 5 best presentation Strongly agree (    ) \r\nAgree               (    ) \r\nDisagree          (    ) \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP2.4-Problem Solving & Scientific Skills Rubric Evaluation (LO6):SV \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nFYP II : WRITTEN REPORT EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\n \r\nWritten Content \r\n \r\nCriteria  \r\n \r\n1 - 4 \r\nWeak \r\n5 - 7 \r\nFair \r\n8 - 10 \r\nGood \r\nScore \r\nAbstract Abstract is not well described. Abstract is too long or too short and needs \r\nrevision. Abstract is clear and well described.  \r\nObjective and Scope Objective or scope is not explained. Objectives and scope are less clear and less \r\nrealistic. Objective and scope are clear and realistic.  \r\nProblem Statement \r\nDemonstrates a limited ability in \r\nidentifying a problem statement or related \r\ncontextual \r\nfactors. \r\nBegins to demonstrate the ability to \r\nconstruct a problem statement with \r\nevidence of most relevant contextual \r\nfactors, but problem statement is \r\nadequately detailed. \r\nDemonstrates the ability to construct a \r\nclear and insightful problem statement with \r\nevidence of all relevant contextual factors \r\n \r\nLiterature Review \r\n \r\nUnable to identify research gap due to \r\ninappropriate or inadequate literature Able to identify research gap using \r\nappropriate and adequate literature \r\nExcellent/good identification of research \r\ngap using appropriate and adequate \r\nliterature \r\n \r\nMethodology Identifies one or more approaches for \r\nsolving the problem that do not apply \r\nwithin a specific context. \r\nIdentifies multiple approaches for solving \r\nthe problem, only some of which apply \r\nwithin a specific context. \r\nIdentifies multiple approaches for solving \r\nthe problem that apply within a specific \r\ncontext \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nResults Analysis and Discussion \r\ni. Problem \r\nSolving \r\nReviews results inadequately in terms of \r\nthe problem defined  \r\n \r\nReviews results adequately relative to the \r\nproblem defined  \r\nReviews results thoroughly relative to the \r\nproblem defined  \r\n \r\nii. Scientific \r\nSkills Poor skill in justifying and presenting the \r\nresult without scientific discussion \r\nSkillfully justify and presenting the result \r\nusing appropriate scientific discussion  \r\nSkillfully justify and presenting the result \r\nusing excellent scientific discussion  \r\n \r\nConclusion and \r\nRecommendation Insufficient summary. No \r\nrecommendations for future works. \r\nSufficient summarization of project \r\nachievements. Acceptable \r\nrecommendations for future works. \r\nClear and complete summarization of \r\nproject achievements. Clear and realistic \r\nrecommendations for future works. \r\n \r\nReferences Insufficient references and do not follow \r\nFST Guidelines. \r\nInconsistent writing of references in \r\naccordance to FST Guidelines. \r\nAppropriate references according to FST \r\nGuidelines, current and supports the \r\ncontent. \r\n \r\nScientific Writing Skill \r\nGrammar Usage \r\nand Spelling \r\n \r\n \r\nVery distracting errors in grammar, \r\npunctuation, spelling and inaccurate \r\nscientific symbols and word usage. \r\nModerate errors in grammar, spelling, \r\npunctuation, and accurate scientific \r\nsymbols, and word usage. \r\nFree of grammatical errors, distracting \r\nspelling and very accurate use of \r\npunctuation, scientific symbols, and word \r\nusage. \r\n \r\nTOTAL / 100 \r\n/40% \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP2.5-Information Management & Lifelong Learning Rubric Evaluation (LO7): SV \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nFYP II: INQUISITIVE MIND EVALUATION FORM \r\n \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic Session :  \r\nCourse :  \r\nTitle of Project :  \r\n :   :  \r\n \r\nAttribute: Lifelong Learning \r\n \r\nSub-attribute Very Weak \r\n(1-2) \r\nWeak \r\n(3-4) \r\nSatisfy \r\n(5-6) \r\nGood \r\n(7-8) \r\nVery Good \r\n(9-10) \r\nScore \r\n Initiative  \r\nExplores only at surface level, \r\nproviding little insight beyond \r\nbasic facts, indicating low \r\nsubject interest. \r\nExplores topic with low \r\napparent evidence of depth, \r\nproviding only occasional \r\ninsight; indicates mild \r\ninterest in topic/subject.  \r\nExplores topic with moderate \r\napparent depth, yielding \r\nmultiple insights. Lacks clear \r\ncomprehension of topic.  \r\nExplores topic with depth of \r\ninterest, revealing significant \r\ninsights of knowledge. Lacks \r\ncomplete comprehension of \r\nsubject.  \r\nExplores topic with great depth of \r\ninterest; reveals significant \r\ninsights of \r\nknowledge/information. \r\nDemonstrates strong \r\ncomprehension of subject.  \r\n \r\nIndependence  \r\nBegins to look beyond \r\nclassroom requirements, \r\nshowing interest in pursuing \r\nknowledge independently. \r\nExplores knowledge \r\nbeyond classroom, \r\nshowing interest in \r\nindependent learning \r\nexperiences.  \r\nEvidence of some knowledge \r\nexploration outside class \r\nenvironment; pursues short-\r\nterm independent learning \r\nopportunity.  \r\nEvidence of substantial \r\nknowledge gained outside \r\nclass environment; shows \r\nstrong interest in extended \r\nindependent learning \r\nopportunities.  \r\nKnowledge pursuits beyond class \r\nare significant and well defined. \r\nEngages in extended independent \r\nlearning opportunity outside of \r\ncurricular completion.  \r\n \r\nApplication/  \r\nTransfer  \r\nMakes vague reference to \r\nprevious learning but does not \r\napply knowledge to \r\nperformance in problem-\r\nsolving simulations/situations. \r\nMakes defined reference to \r\npreviously gained \r\nknowledge but does not \r\napply to problem solving.  \r\nMakes defined reference to \r\ngathered previous knowledge \r\nand demonstrates limited \r\ncapacity to utilize in problem-\r\nsolving/novel situations.  \r\nDemonstrates reference to \r\npreviously gained knowledge \r\nand demonstrates strong \r\napplication to solving of \r\nnovel problems.  \r\nMakes explicit reference to \r\nprevious knowledge and applies \r\nthese skills to solving of problem \r\nin novel and creative \r\nmethods/manners.  \r\n \r\nReflection  \r\nReviews prior learning at a \r\nsurface level, but without \r\nclarified meaning or \r\nindicating a broader \r\nperspective about educational \r\nor life events. \r\nReviews prior learning \r\nwith limited capacity, \r\ngiving minor clarification \r\nor broad perspective.  \r\nReviews prior learning and \r\nshows clarification or broad \r\nperspective about educational \r\nor life events.  \r\nReviews prior learning in \r\nsome depth, revealing clear \r\nmeaning and indicating broad \r\nperspectives related to \r\neducational events.  \r\nReviews prior learning in depth to \r\nreveal significantly changed \r\nperspectives about educational \r\nand life experiences.  \r\n \r\nTOTAL \r\n/40 \r\n \r\n/5% \r\n \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nFYP2.6-Practical Skills for ISA Programme (LO2): Examiner \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nFYP II: PRACTICAL SKILLS EVALUATION RUBRIC (PROJECT EVALUATION) \r\nName :  \r\nMatric No.  :  Semester  :  \r\nProgramme :  Academic \r\nSession :  \r\n \r\nCourse :  \r\nTitle of Assignment / Project :  \r\n \r\nCriteria  \r\n \r\n1 - 2 \r\nWeak \r\n3 - 5 \r\nFair \r\n6 - 8 \r\nGood \r\n9 - 10 \r\nVery Good \r\nScore \r\nApplication/tools \r\nskills (Project \r\nrequirements) \r\nUnable to solve problems \r\nwith application/tools \r\ngiven. \r\nAble to solve 50% of the \r\nproblems with \r\napplication/tools given. \r\nAble to solve 75% of the \r\nproblems with \r\napplication/tools given. \r\nAble to solve all problems \r\nwith application/tools \r\ngiven. \r\n \r\nOPTION A - System / \r\nApps: Error Handling  \r\n \r\nOR \r\n \r\nOPTION B - Algorithm: \r\nTest Plan \r\nPoor or no error handling.  \r\n \r\nOR \r\n \r\nTest Plan with improper \r\ndata set.  \r\nError messages displays \r\nin code language and \r\nuser cannot understand.  \r\nOR \r\n \r\nTest Plan with minimal \r\ndata set.  \r\nError messages displays \r\nin code language and \r\nuser can understand. \r\nOR \r\n \r\nTest Plan with acceptable \r\ndata set.  \r\nError messages \r\nexpresses in plain \r\nlanguage clearly.  \r\nOR \r\n \r\nTest Plan with exhaustive \r\ndata set. \r\n \r\nSecurity  \r\nVery low security element \r\nimplemented in the \r\nproject.  \r\nLow security elements are \r\nimplemented in the \r\nproject.  \r\nMedium security elements \r\nare implemented in the \r\nproject.  \r\nHigh security elements \r\nare implemented in the \r\nproject.  \r\n \r\nQuality/Accuracy of Work \r\n(e.g: Interface) \r\nThe work quality is poor \r\nor inaccurate. \r\nThe work quality is poor \r\nwith 50% accuracy. \r\nThe work quality is good \r\nwith 75% accuracy. \r\nThe work quality is \r\nexcellent and accurate.  \r\nFormula/Skills Used \r\n(Overall project) Unable to solve problems \r\nwith formula/guidance \r\ngiven. \r\nAble to solve 50% of the \r\nproblems with \r\nformula/guidance given. \r\nAble to solve 75% of the \r\nproblems with \r\nformula/guidance given.  \r\nAble to solve all the \r\nproblems without \r\nformula/guidance given.  \r\n \r\nTOTAL  /50 \r\n\r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\n \r\nVERIFICATION AND TOTAL MARKS \r\n \r\n \r\n \r\n \r\n \r\n \r\nComments  \r\nRecommendation for top 5 best presentation Strongly agree (    ) \r\nAgree               (    ) \r\nDisagree          (    ) \r\n \r\n \r\n \r\n  \r\n  \r\n \r\n© Faculty of Science & Technology | Version 3.0 | January 2019 \r\n \r\nEVALUATION \r\n \r\nFYP I \r\nLO Percentage (%) Action By \r\nLO4 Integrity  10 Coordinator \r\nLO5 Written Report 30 Average: SV and Evaluator \r\nLO5 Presentation 40 Average: Evaluators \r\nLO7 Info Retrieve 20 SV \r\nTotal 100  \r\nFYP II \r\nLO Percentage (%) Action By \r\nLO4 Plagiarism 10 Supervisor \r\nLO4 Ethics 10 Coordinator \r\nLO5 Oral  20 Average: Evaluators \r\nLO5 Poster  15 Average: Evaluators \r\nLO6 Written report 40 Average: SV and evaluator \r\nLO7 Inquisitive mind 5 SV \r\nTotal 100  \r\nFYP II for ISA Programme only \r\nLO Percentage (%) Action By \r\nLO2 Practical 20 Average: Evaluators \r\nLO4 Plagiarism 10 Supervisor \r\nLO4 Ethics 10 Coordinator \r\nLO5 Oral  20 Average: Evaluators \r\nLO5 Poster  15 Average: Evaluators \r\nLO6 Written report 40 Average: SV and evaluator \r\nLO7 Inquisitive mind 5 SV \r\nTotal 120 (100%)  \r\n ', NULL),
(18, 'COURSE OUTLINE.pdf', 0x6170706c69636174696f6e2f706466, 244424, '            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 1 of 8 \r\n-1- \r\n\r\nNAME OF COURSE/MODULE: THESIS I (TESIS I)  \r\nCOURSE CODE: SKJ4232  \r\nNAME(S) OF ACADEMIC STAFF: DR. SAKINAH ALI PITCHAY  \r\nRATIONALE FOR THE \r\nINCLUSION OF THE \r\nCOURSE/MODULE IN THE \r\nPROGRAMME: \r\nThe thesis provides the opportunity for students to develop a substantial investigation into the ideas about Computer Science in general and/or focusing on \r\nInformation Security and Assurance and related fields. Projects will be presented, discussed and evaluated in relation to experimental design precedents, \r\ntheoretical and practical issues. The thesis will aim to demonstrate independent critical and creative thinking in presenting coherent, well-argued ideas in a \r\nsustained piece of writing. \r\nSEMESTER AND YEAR \r\nOFFERED: \r\nSEM 6 / YEAR 3 \r\nTOTAL STUDENT LEARNING \r\nTIME (SLT) \r\nFACE TO FACE NON FACE TO FACE TOTAL SLT \r\nL = Lecture \r\nT = Tutorial \r\nP = Practical \r\nO= Others \r\nL \r\n \r\n6 \r\nT \r\n \r\n0 \r\nP \r\n \r\n0 \r\nO \r\n \r\n6 \r\nL \r\n \r\n0 \r\nT \r\n \r\n0 \r\nP \r\n \r\n0 \r\nO \r\n \r\n78 \r\n \r\n \r\n90 \r\nCREDIT VALUE: 2 \r\nPREREQUISITE (IF ANY): NONE \r\nOBJECTIVES:  To think critically and make connections in learning across the disciplines. \r\n To communicate effectively using standard written English. \r\n To demonstrate an awareness of ethical considerations in making value choices. \r\nLEARNING OUTCOMES: \r\n \r\nAt the end of this course, students will be able to: \r\nCLO1:    Independently seek and manage research knowledge and make connections in learning across the disciplines.  (A3, LL1  LO7)                   \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 2 of 8 \r\n-2- \r\n\r\nCLO2:    Adopt professional practice and ethics in writing a research proposal.  (A3, EM1  LO4) \r\nCLO3:    Orally defend the research proposal.  (A4, CS3  LO5) \r\nTRANSFERABLE SKILLS:  1. Information management and lifelong learning skills \r\n2. Values, attitudes and professionalism \r\n3. Communication skills \r\nTEACHING-LEARNING AND \r\nASSESSMENT STRATEGY: \r\n \r\n \r\n \r\nCLO TEACHING  LEARNING STRATEGY (TLA) ASSESSMENT STRATEGY \r\nCLO1  Information  management  and  lifelong \r\nlearning skills \r\n2 lectures, \r\n4 proposal supervisions \r\nResearch Proposal  \r\nAll Chapter (5000 words) \r\nCLO2 -  Values, attitudes and professionalism 1 lecture, \r\n2 proposal supervisions \r\nResearch Proposal \r\nAll Chapter (5000 words) \r\nCLO3  Communication skills 1 proposal supervisions \r\n1 Discussion Presentation (1 hour) \r\nSYNOPSIS:  \r\n \r\nThis is a two-semester supervised independent research work, culminating with the production of a thesis. The thesis module is aimed at engendering \r\nstudents with a spirit of enquiry into a research-based dissertation. All projects will include the development of research skills, analysis and discussion of \r\nresults as well as an opportunity to compose a written report in which an evaluation of the relevant literature and research findings are presented. Each \r\nfinal year student is required to conduct a research project under the supervision of a lecturer. Before beginning a project, the student must present a \r\nresearch proposal in a seminar which will be conducted by coordinator.  \r\nMODE OF DELIVERY: Lecture, Supervision and Discussion. \r\nASSESSMENT METHODS AND \r\nTYPES:  \r\nCLO ASSESSMENT TYPE F2F NF2F Total SLT (TLA) WEIGHTAGE \r\nCLO1 Research Proposal  \r\nAll Chapter (5000 words) \r\n6  = 9/11X100% = 81.81% ~ 80% 0.80 \r\nCLO2 \r\nResearch Proposal \r\nAll Chapter (5000 words) 1  = 1/11X100% = 9.09% ~ 10% 0.10 \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 3 of 8 \r\n-3- \r\n\r\nCLO3 Presentation (1 hour) 1  = 1/11X100% = 9.09% ~ 10% 0.10 \r\nTotal 11 0 79 = 100% 1.0 \r\n \r\n \r\nCLO \r\nTYPE OF CONTINUOUS ASSESSMENT TYPE OF SUMMATIVE ASSESSMENT \r\nTOTAL     Research \r\nProposal \r\nEthics and \r\nSupervision Presentation \r\nCLO1     55   55 \r\nCLO2      20  20 \r\nCLO3       25 25 \r\nTOTAL 100% \r\n \r\nMAPPING OF THE COURSE/MODULE TO THE PROGRAMME AIMS \r\n \r\n \r\nPEO1 PEO2 PEO3 PEO4 \r\n    \r\nMAPPING OF THE COURSE/MODULE TO THE PROGRAMME LEARNING OUTCOMES \r\nPLO1 PLO2 PLO3 PLO4 PLO5 PLO6 PLO7 PLO8 PLO9 \r\n         \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 4 of 8 \r\n-4- \r\n\r\n \r\nCONTENT OUTLINE OF THE COURSE/MODULE AND THE SLT PER TOPIC \r\nCLO WEEK TOPIC/CONTENT TLA F2F NF2F TOTAL ASSESSMENT TYPES F2F NF2F TOTAL SLT \r\nCLO1 \r\n \r\n1 \r\nIntroduction to Thesis I \r\n Synopsis \r\n Assessment \r\n Writing format  \r\n  lecture \r\n 1  1 \r\n \r\n  1 \r\n2  Introduction to Research  \r\n Ethics and Plagiarism   lecture 1  1   1 \r\n3-4 Formulating Research Problem proposal \r\nsupervision 0.5  0.5 Research Proposal \r\nChapter 1 and 3 \r\n \r\n 7 7.5 \r\n7 & 8 Research Methodology  proposal \r\nsupervision 0.5  0.5  10 10.5 \r\nCLO1 \r\n3-4 Formulating Research Problem proposal \r\nsupervision 0.5  0.5 \r\nResearch Proposal \r\nAll Chapter (5000 words) \r\n 2 2.5 \r\n5 & 6 Preparing Literature Review proposal \r\nsupervision 1  1  16 17 \r\n7 & 8 Research Methodology  proposal \r\nsupervision 0.5  0.5  2 2.5 \r\n9-12 Writing Research Proposal proposal \r\nsupervision 4  4  30 34 \r\nCLO2 2 Ethics and Plagiarism proposal \r\nsupervision 1  1 Research Proposal \r\n(5000 words)  6 7 \r\nCLO3 13-14 Research Proposal Defence  \r\nDiscussion 1  1 Presentation 1 5 7 \r\nSUBTOTAL 11  11  1 78 90 \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 5 of 8 \r\n-5- \r\n\r\n \r\nDEVELOPMENT OF LESSON PLAN \r\nCLO WEEK INPUT/TOPIC/CONTENT TOPIC LEARNING OUTCOME TLA TEACHING MATERIALS/ \r\nEQUIPMENT \r\nASSESSMENT \r\nSTRATEGY \r\n \r\n \r\n \r\n \r\n \r\n \r\nCLO1 \r\n \r\n \r\n1 \r\nIntroduction to Thesis I \r\n Synopsis \r\n Assessment \r\n Writing guidelines \r\n List the advantages of doing the \r\ncourse. \r\n Name the assessment method \r\nfor thesis I \r\n List four of the writing format  \r\nLecture \r\nStudent will be given an information \r\nregarding on doing research. They need to \r\nfollow the FST writing guidelines. \r\n1. FST Thesis guideline _main \r\ndocument \r\n2. FST Thesis guideline _appendices \r\n3.  Handbook \r\non Academic Writing. \r\nPenerbit : Universiti Sains \r\nIslam Malaysia. \r\n \r\n- \r\n2 \r\n Introduction to \r\nResearch  \r\n Ethics and Plagiarism \r\n State the meaning of research \r\n Identify the importance of \r\nresearch \r\n Differentiate ethics practices \r\nand plagiarism activities. \r\nLecture \r\nStudent will be given an introduction doing \r\nresearch in computer science, ethics and \r\nplagiarism issues.  \r\n1. FST Thesis guideline _main \r\ndocument \r\n2. FST Thesis guideline \r\n_appendices \r\nFormative: \r\nStudents need to \r\nsubmit a register \r\nform to \r\ncoordinator. \r\n \r\nCLO1 \r\n& \r\nCLO2 3-4 \r\n \r\nFormulating Research \r\nProblem \r\n \r\n \r\n Develop problem statements. \r\n \r\n \r\nProposal Supervision \r\nResponds given to the students regarding on \r\nformulating research problem and at the end \r\nstudents will able to develop their problem \r\nstatements for their research. \r\nLeedy, P. D & Ormrod, J. E. (2015). \r\nPractical  Research:  Planning  and \r\nDesign. 11th Edition. Pearson. \r\n \r\nFormative: \r\nStudents need to \r\nsubmit the \r\nreviewed chapter \r\none to supervisor. \r\n7 & 8 \r\n \r\n \r\nResearch Methodology  \r\n \r\n \r\n \r\n Identify methods for the \r\nresearch. \r\n \r\n \r\nProposal Supervision \r\nResponds given to the students regarding on \r\nphilosophy of research methodology. \r\nStudents has been exposed the nature and \r\nthe science of research knowledge and at the \r\nend students will able to identify \r\nindependently research methods appropriate \r\nwith their study.  \r\nAllan, A.G., Randy, L.J.  & William, \r\nA.  R.  (2013). Writing  the  Winning \r\nThesis  or  Dissertation:  A  Step-by-\r\nStep  Guide.  3rd Edition.  California: \r\nCorwin Press. \r\n \r\nFormative: \r\nStudents need to \r\nsubmit the \r\nreviewed chapter \r\nthree to \r\nsupervisor. \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 6 of 8 \r\n-6- \r\n\r\n \r\n \r\n \r\n \r\nDEVELOPMENT OF LESSON PLAN \r\nCLO WEEK INPUT/TOPIC/CONTENT TOPIC LEARNING \r\nOUTCOME \r\nTLA TEACHING MATERIALS/ \r\nEQUIPMENT \r\nASSESSMENT STRATEGY \r\n \r\nCLO1 \r\n5 & 6 \r\n \r\nPreparing Literature \r\nReview \r\n \r\n Analysis, summarization, \r\nand interpretation a \r\nvariety of reading \r\nmaterials. \r\n \r\nProposal Supervision \r\nResponds given to the students \r\nregarding on preparing literature \r\nreview. Students has been \r\nexposed how to extract the ideas \r\nand do analysis from the materials \r\nat the end students will able to \r\nmake a summarization and \r\ninterpretation on the materials. \r\nLeedy, P.  D  & Ormrod, J.  E. \r\n(2015).  Practical  Research: \r\nPlanning and Design. 11th Edition. \r\nPearson. \r\n \r\nFormative: \r\nStudents need to submit the \r\nreviewed chapter two to \r\nsupervisor. \r\n9-13 \r\n \r\nWriting Research \r\nProposal \r\n \r\n List the chapters in a \r\nproposal. \r\n State the contents for \r\neach of the chapters in a \r\nproposal. \r\nProposal Supervision \r\nResponds given to the students \r\nregarding on preparing literature \r\nreview. Students has been \r\nexposed how to extract the ideas \r\nand do analysis from the materials \r\nat the end students will able to \r\nmake a summarization and \r\ninterpretation on the materials. \r\nGraustein,  J.S.  (2013).  How  to \r\nWrite  an  Exceptional  Thesis  or \r\nDissertation:  A  Step-By-Step \r\nGuide  from  Proposal  to \r\nSuccessful  Defense Paperback \r\nUSA: Atlanta Publishing Group. \r\n \r\nFormative: \r\nStudents need to submit the \r\nreviewed chapters as draft to \r\nsupervisor. \r\n \r\nSummative: \r\nStudents need to submit the \r\nreviewed chapters with the \r\ncorrect format to supervisor. \r\n \r\n \r\nCLO2 \r\n2 \r\n \r\nEthics and Plagiarism \r\n Adopt professional \r\npractice and ethics in \r\nwriting a research \r\nproposal \r\n \r\nProposal Supervision \r\nResponds given to the students \r\nregarding on preparing a proposal. \r\nStudents has been exposed how to \r\nwrite a proposal professionally.  At \r\nthe end students will able to have a \r\n\r\nformat of citation and references. \r\n1. FST Thesis guideline _main \r\ndocument \r\n2. FST Thesis guideline \r\n_appendices \r\n3.  \r\nHandbook on Academic \r\nWriting. Penerbit : \r\nUniversiti Sains Islam \r\nMalaysia. \r\n \r\nSummative: \r\nStudents need to submit the \r\nreviewed chapters with the \r\ncorrect format to supervisor.  \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 7 of 8 \r\n-7- \r\n\r\n \r\n \r\nMAIN REFERENCES SUPPORTING \r\nTHE COURSE \r\n1. 2nd Edition Guidelines for Undergraduate Thesis (2017). Faculty of Science and Technology, Universiti Sains Islam Malaysia. \r\n2. n.a. (2014) Handbook on Academic Writing. Penerbit : Universiti Sains Islam Malaysia.  \r\n3. Allan, A.G., Randy, L.J.  & William, A. R. (2013). Writing the Winning Thesis or Dissertation: A Step-by-Step Guide. 3rd Edition. California: \r\nCorwin Press.  \r\n4. Graustein, J.S. (2013). How to Write an Exceptional Thesis or Dissertation: A Step-By-Step Guide from Proposal to Successful Defense \r\nPaperback USA: Atlanta Publishing Group. \r\n5. Leedy, P. D & Ormrod, J. E. (2015). Practical Research: Planning and Design. 11th Edition. Pearson. \r\n6. Murray, R.   (2016).   How to Write a Thesis. 4th Edition.   USA: Open University Press. \r\nADDITIONAL  REFERENCES \r\nSUPPORTING THE COURSE \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\nDEVELOPMENT OF LESSON PLAN \r\nCLO WEEK INPUT/TOPIC/CONTENT TOPIC LEARNING \r\nOUTCOME \r\nTLA TEACHING MATERIALS/ \r\nEQUIPMENT \r\nASSESSMENT STRATEGY \r\n \r\nCLO3 \r\n13 - 14 \r\n \r\n \r\nResearch Proposal \r\nDefence \r\n To communicate \r\neffectively using standard \r\nwritten English. \r\n To prepare a slide \r\npresentation. \r\n \r\nDiscussion \r\nLecturer is to brief on the ways to \r\npresentation \r\nskills. \r\nStudents are required to prepare a \r\nslide presentation and have a pre-\r\npresentation in order to improve \r\nand to defend their proposal. \r\nGraustein, J.S. (2013). How to \r\nWrite an Exceptional Thesis or \r\nDissertation: A Step-By-Step \r\nGuide from Proposal to \r\nSuccessful Defense Paperback \r\nUSA: Atlanta Publishing Group \r\nSummative: \r\nStudents need to present the \r\nproposal research.   \r\n20 mins: presentation  \r\n10 mins: Q & A session. \r\n            UNIVERSITI SAINS ISLAM MALAYSIA \r\nCOURSE INFORMATION \r\n \r\nISSUE DATE: REVIEW DATE: REVIEW NO.: PAGE: \r\n   Page 8 of 8 \r\n-8- \r\n\r\nPREPARED BY CHECKED BY CERTIFIED BY \r\n  \r\n \r\n \r\n       \r\n \r\nName : ___________________________________ \r\nPosition: ___________________________________ \r\nDate : ___________________________________ \r\n \r\nName : ___________________________________ \r\nPosition: ___________________________________ \r\nDate : ___________________________________ \r\n \r\nName : ___________________________________ \r\nPosition: ___________________________________ \r\nDate : ___________________________________ \r\n \r\n \r\nOfficial Stamp \r\n \r\nOfficial Stamp \r\n \r\nOfficial Stamp \r\nDr. Sakinah Ali Pitchay \r\nSenior Lecturer  \r\n25 February 2018 \r\nDr. Sakinah Ali Pitchay \r\nHead of Programme (Information Security \r\nand Assurance) \r\n26 February 2018 ', NULL);
INSERT INTO `tbl_uploads` (`file_id`, `filename`, `type`, `size`, `content`, `tag`) VALUES
(28, '201727555.pdf', 0x6170706c69636174696f6e2f706466, 391094, '\r\n\n\r\n*201727555**2004-201727555**21.03*\r\nBalance Brought\r\nForward\r\nPayment ReceivedMiscellaneous ChargesCurrent UtilisationTotal Amount Due\r\nRM 11.33RM 0.00RM 0.00RM 9.70RM 21.03\r\nKAMARIAH BINTI ABDUL ZABIL\r\nLOT 12898\r\nJALAN EXPO\r\nKAMUNTING, 34600, PERAK, MALAYSIA\r\nCustomer ID:201727555\r\nMobile No:01155035198\r\nInvoice No:2004-201727555\r\nInvoice Date:01/04/2020\r\nDue Date:30/04/2020\r\nTax Invoice\r\n Balance Brought Forward11.33\r\n Payment Received ~ Thank You0.00\r\n Miscellaneous Charges0.00\r\n Current Utilisation\r\nProduct Charges8.00\r\nUsage Charges1.15\r\nST0.55\r\n9.70\r\n Total Amount Due21.03\r\nFor inquiries, please call\r\n1-300-11-0088\r\nGet more Awesome Data with our NEW Amazing Plans!\r\n\r\n\r\n                                                 PAYMENT SLIP\r\nContact Person:KAMARIAH BINTI ABDUL ZABIL\r\nCompany Name:\r\nCustomer ID:201727555\r\nMobile No.:01155035198\r\nInvoice No.:2004-201727555\r\nInvoice Date:01/04/2020\r\nDue Date:30/04/2020\r\nST No:W10-1808-32000109\r\nBalance Brought\r\nForward\r\nCurrent\r\nUtilisation\r\nTotal Amount\r\nDue\r\nRM 11.33RM 9.70RM 21.03\r\n\r\nBiller Code: 8607\r\nRef-1: \r\n201727555\r\nJomPAY \r\nonline at Internet and Mobile Banking\r\nwith your Current or Savings account.\r\nNOTE: \r\nPay your bills at any outlet or online at www.redone.com.my and select \'Self Care\r\n            Login\'. Or use any of these other payment methods:\r\n\r\nRED ONE NETWORK SDN BHD\r\nA-03-42, Block A, 3rd Floor, IOI Boulevard\r\nJalan Kenari 5, Bandar Puchong Jaya\r\n47170 Puchong, Selangor, Malaysia.\r\nFor mail-in or ATM cheque deposits, please write\r\nyour name, account number, and contact number\r\non the reverse side of your cheque. Enclose\r\npayment slip with crossed cheque payable to\r\n\"RED ONE NETWORK SDN BHD\".\r\n\r\n\n\r\n\r\n\n\r\n\r\nBill DetailsCustomer ID:201727555Invoice No.:2004-201727555\r\nCompany Name:Invoice Date:01/04/2020\r\nProduct Charges\r\nItemAmount\r\nG Data Commitment Fee (* Mar2020 *) ~ 011550351988.00\r\nTotalRM 8.00\r\nUsage Charges\r\nItemAmount\r\nG Voice1.15\r\nTotalRM 1.15\r\nMiscellaneous Charges\r\nItemAmount\r\nTotalRM 0.00\r\nTaxation Info\r\nItemAmount\r\nUsage Charges: ST 6% on 1.150.07\r\nProduct Charges: ST 6% on 8.000.48\r\nTotalRM 0.55\r\nPayment Received\r\nItemAmount\r\nTotalRM 0.00\r\nDeposit Info\r\nItemAmount\r\nTotalRM 0.00\r\n\r\n\r\n\n\r\n\r\nCall Utilisation DetailsCustomer ID:201727555Invoice No.:2004-201727555\r\nCompany Name:Invoice Date:01/04/2020\r\nItemDestinationRemarksDateTimeDurationAmount\r\nPhone No.: 0115503519810184615284Off-Net MOB01-03-202019:30:2500:00:010.08\r\n20176019614Off-Net MOB08-03-202015:35:3400:00:130.08\r\n30193081957Celcom-Net MOB08-03-202018:29:5400:00:020.08\r\n40195777444Celcom-Net MOB09-03-202010:41:5000:00:500.15\r\n5068508503Off-Net STD10-03-202014:42:4700:00:290.08\r\n6068508503Off-Net STD10-03-202015:58:2200:00:530.15\r\n70195777444Celcom-Net MOB15-03-202018:20:4200:01:520.30\r\n80137799345Celcom-Net MOB16-03-202021:10:4200:00:020.08\r\n90137799345Celcom-Net MOB16-03-202021:12:0800:00:360.15\r\nTotal1.15\r\n\r\n\n\r\n\r\nSummarised Info (Mobile)Customer ID:201727555Invoice No.:2004-201727555\r\nCompany Name:Invoice Date:01/04/2020\r\nItemCharging UnitsAmount\r\nFree redONE Call00:15:140.00\r\nFree Off-Net Call00:00:000.00\r\nFree SMS-0.00\r\nredONE SMS-0.00\r\nOff-Net SMS-0.00\r\nInt\'l SMS-0.00\r\nredONE MMS-0.00\r\nOff-Net MMS-0.00\r\nInt\'l MMS-0.00\r\nFree Data457.6 MB0.00\r\nPay Per Use Data-0.00\r\n\r\n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testtable`
--

CREATE TABLE `testtable` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testtable`
--

INSERT INTO `testtable` (`id`, `number`) VALUES
(1, 319),
(2, 145),
(3, 685),
(4, 579),
(5, 208),
(6, 870),
(7, 120),
(8, 325),
(9, 863),
(10, 117),
(11, 880),
(12, 258),
(13, 210),
(14, 898),
(15, 215),
(16, 683),
(17, 176),
(18, 397),
(19, 630),
(20, 768),
(21, 493),
(22, 342),
(23, 306),
(24, 316),
(25, 384),
(26, 159),
(27, 728),
(28, 716),
(29, 854),
(30, 995),
(31, 762),
(32, 334),
(33, 494),
(34, 941),
(35, 169),
(36, 217),
(37, 415),
(38, 439),
(39, 726),
(40, 127),
(41, 483),
(42, 730),
(43, 728),
(44, 961),
(45, 973),
(46, 245),
(47, 841),
(48, 514),
(49, 317),
(50, 636),
(51, 143),
(52, 717),
(53, 923),
(54, 414),
(55, 445),
(56, 480),
(57, 851),
(58, 646),
(59, 837),
(60, 247),
(61, 268),
(62, 505),
(63, 638),
(64, 225),
(65, 709),
(66, 712),
(67, 952),
(68, 505),
(69, 268),
(70, 404),
(71, 930),
(72, 929),
(73, 539),
(74, 793),
(75, 289),
(76, 353),
(77, 333),
(78, 619),
(79, 127),
(80, 659),
(81, 941),
(82, 141),
(83, 687),
(84, 689),
(85, 197),
(86, 566),
(87, 408),
(88, 802),
(89, 172),
(90, 396),
(91, 696),
(92, 460),
(93, 725),
(94, 804),
(95, 245),
(96, 255),
(97, 631),
(98, 872),
(99, 834),
(100, 140),
(101, 318),
(102, 953),
(103, 753),
(104, 211),
(105, 322),
(106, 643);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uId` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uId`, `username`, `email`, `password`) VALUES
(0, 'admin', 'user@123.com', 'd94b3bfb6ef8cc388586f9b1407ed2b8'),
(5, 'user1', 'user@123.com', '25d55ad283aa400af464c76d713c07ad'),
(21, 'user2', 'user@123.com', 'd94b3bfb6ef8cc388586f9b1407ed2b8'),
(22, 'user3', 'user@123.com', 'd94b3bfb6ef8cc388586f9b1407ed2b8'),
(23, 'user4', 'user@123.com', 'd94b3bfb6ef8cc388586f9b1407ed2b8'),
(29, 'user5', 'user@123.com', 'd94b3bfb6ef8cc388586f9b1407ed2b8');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `exam_user` (`uID`);

--
-- Indexes for table `q_list`
--
ALTER TABLE `q_list`
  ADD PRIMARY KEY (`q_id`),
  ADD KEY `user_question` (`u_id`);

--
-- Indexes for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `testtable`
--
ALTER TABLE `testtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `q_list`
--
ALTER TABLE `q_list`
  MODIFY `q_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_uploads`
--
ALTER TABLE `tbl_uploads`
  MODIFY `file_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `testtable`
--
ALTER TABLE `testtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_user` FOREIGN KEY (`uID`) REFERENCES `user` (`uId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `q_list`
--
ALTER TABLE `q_list`
  ADD CONSTRAINT `user_question` FOREIGN KEY (`u_id`) REFERENCES `user` (`uId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
