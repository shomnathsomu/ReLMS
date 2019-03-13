-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2019 at 07:54 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learn`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`admin_id`, `admin_name`, `email`, `password`) VALUES
(1, 'admin', 'shomnathcse22@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_order` int(11) NOT NULL,
  `top_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name`, `category_image`, `category_order`, `top_category_id`) VALUES
(68, 'HTML5', 'html5.png', 1, 34),
(69, 'CSS3', 'css3.jpg', 2, 34),
(70, 'C++', 'cpppp.png', 1, 33),
(71, 'Java 8', 'java-logo.png', 2, 33),
(72, 'Hyperledger fabric', 'hyperledger_fabric.png', 1, 38),
(73, 'Python', 'python.png', 3, 33),
(74, 'Artificial Intelligence', 'AI.jpg', 1, 37),
(75, 'Machine Learning', 'ML.png', 2, 37),
(76, 'Deep Learning', 'DL.png', 3, 37);

-- --------------------------------------------------------

--
-- Table structure for table `table_lecture`
--

CREATE TABLE `table_lecture` (
  `lecture_id` int(11) NOT NULL,
  `lecture_content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `lecture_order` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_lecture`
--

INSERT INTO `table_lecture` (`lecture_id`, `lecture_content`, `lecture_order`, `sub_category_id`) VALUES
(8, '<h2>What is HTML?</h2>\r\n\r\n<p>HTML is the standard markup language for creating Web pages.</p>\r\n\r\n<ul>\r\n	<li>HTML stands for Hyper Text Markup Language</li>\r\n	<li>HTML describes the structure of Web pages using markup</li>\r\n	<li>HTML elements are the building blocks of HTML pages</li>\r\n	<li>HTML elements are represented by tags</li>\r\n	<li>HTML tags label pieces of content such as &quot;heading&quot;, &quot;paragraph&quot;, &quot;table&quot;, and so on</li>\r\n	<li>Browsers do not display the HTML tags, but use them to render the content of the page</li>\r\n</ul>\r\n\r\n<h2>HTML Tags</h2>\r\n\r\n<p>HTML tags are element names surrounded by angle brackets:</p>\r\n\r\n<p>content goes here...</p>\r\n\r\n<ul>\r\n	<li>HTML tags normally come&nbsp;<strong>in pairs</strong>&nbsp;like&nbsp;\r\n\r\n	<p>&nbsp;and&nbsp;</p>\r\n	</li>\r\n	<li>The first tag in a pair is the&nbsp;<strong>start tag,</strong>&nbsp;the second tag is the&nbsp;<strong>end tag</strong></li>\r\n	<li>The end tag is written like the start tag, but with a&nbsp;<strong>forward slash</strong>&nbsp;inserted before the tag name</li>\r\n</ul>\r\n\r\n<p><strong>Tip:</strong>&nbsp;The start tag is also called the&nbsp;<strong>opening tag</strong>, and the end tag the&nbsp;<strong>closing tag</strong>.</p>\r\n\r\n<h2>Web Browsers</h2>\r\n\r\n<p>The purpose of a web browser (Chrome, IE, Firefox, Safari) is to read HTML documents and display them.</p>\r\n\r\n<p>The browser does not display the HTML tags, but uses them to determine how to display the document:</p>\r\n\r\n<p><img alt=\"\" src=\"/elearning/admin/kcfinder/upload/images/html_intro.png\" style=\"height:361px; width:635px\" /></p>\r\n\r\n<h2>The Declaration</h2>\r\n\r\n<p>The&nbsp;&nbsp;declaration represents the document type, and helps browsers to display web pages correctly.</p>\r\n\r\n<p>It must only appear once, at the top of the page (before any HTML tags).</p>\r\n\r\n<p>The&nbsp;&nbsp;declaration is not case sensitive.</p>\r\n\r\n<p>The&nbsp;&nbsp;declaration for HTML5 is:</p>\r\n\r\n<p>&lt;!DOCTYPE&nbsp;html&gt;</p>', 1, 1),
(9, '<h2>Write HTML Using Notepad or TextEdit</h2>\r\n\r\n<p>Web pages can be created and modified by using professional HTML editors.</p>\r\n\r\n<p>However, for learning HTML we recommend a simple text editor like Notepad (PC) or TextEdit (Mac).</p>\r\n\r\n<p>We believe using a simple text editor is a good way to learn HTML.</p>\r\n\r\n<p>Follow the four steps below to create your first web page with Notepad or TextEdit.</p>\r\n\r\n<h2>Step 1: Open Notepad (PC)</h2>\r\n\r\n<p><strong>Windows 8 or later:</strong></p>\r\n\r\n<p>Open the&nbsp;<strong>Start Screen</strong>&nbsp;(the window symbol at the bottom left on your screen). Type&nbsp;<strong>Notepad</strong>.</p>\r\n\r\n<p><strong>Windows 7 or earlier:</strong></p>\r\n\r\n<p>Open&nbsp;<strong>Start</strong>&nbsp;&gt;<strong>&nbsp;Programs &gt;</strong>&nbsp;<strong>Accessories &gt;</strong>&nbsp;<strong>Notepad</strong></p>\r\n\r\n<h2>Step 2: Write Some HTML</h2>\r\n\r\n<p>Write or copy some HTML into Notepad.</p>\r\n\r\n<p><img alt=\"\" src=\"/elearning/admin/kcfinder/upload/images/html_editor.png\" style=\"height:232px; width:400px\" /></p>\r\n\r\n<h2>Step 3: Save the HTML Page</h2>\r\n\r\n<p>Save the file on your computer. Select&nbsp;<strong>File &gt; Save as</strong>&nbsp;in the Notepad menu.</p>\r\n\r\n<p>Name the file&nbsp;<strong>&quot;index.htm&quot;</strong>&nbsp;and set the encoding to&nbsp;<strong>UTF-8</strong>&nbsp;(which is the preferred encoding for HTML files).</p>\r\n\r\n<p><img alt=\"\" src=\"/elearning/admin/kcfinder/upload/images/html_editor1.png\" style=\"height:192px; width:631px\" /></p>\r\n\r\n<h2>Step 4: View the HTML Page in Your Browser</h2>\r\n\r\n<p>Open the saved HTML file in your favorite browser (double click on the file, or right-click - and choose &quot;Open with&quot;).</p>\r\n\r\n<p>The result will look much like this:</p>\r\n\r\n<p><img alt=\"\" src=\"/elearning/admin/kcfinder/upload/images/html_editor2.png\" style=\"height:361px; width:635px\" /></p>\r\n\r\n<p>&nbsp;</p>', 2, 2),
(10, '<h1 style=\"text-align:center\">C++ Tutorial</h1>\r\n\r\n<p>C++ is a middle-level programming language developed by Bjarne Stroustrup starting in 1979 at Bell Labs. C++ runs on a variety of platforms, such as Windows, Mac OS, and the various versions of UNIX. This tutorial adopts a simple and practical approach to describe the concepts of C++.</p>\r\n\r\n<h1 style=\"text-align:center\">Audience</h1>\r\n\r\n<p>This tutorial has been prepared for the beginners to help them understand the basic to advanced concepts related to C++.</p>\r\n\r\n<h1 style=\"text-align:center\">Prerequisites</h1>\r\n\r\n<p>Before you start practicing with various types of examples given in this tutorial,we are making an assumption that you are already aware of the basics of computer program and computer programming language.</p>', 1, 11),
(11, '<h1 style=\"text-align:center\">C++ Overview</h1>\r\n\r\n<p>C++ is a statically typed, compiled, general-purpose, case-sensitive, free-form programming language that supports procedural, object-oriented, and generic programming.</p>\r\n\r\n<p>C++ is regarded as a&nbsp;<strong>middle-level</strong>&nbsp;language, as it comprises a combination of both high-level and low-level language features.</p>\r\n\r\n<p>C++ was developed by Bjarne Stroustrup starting in 1979 at Bell Labs in Murray Hill, New Jersey, as an enhancement to the C language and originally named C with Classes but later it was renamed C++ in 1983.</p>\r\n\r\n<p>C++ is a superset of C, and that virtually any legal C program is a legal C++ program.</p>\r\n\r\n<p><strong>Note</strong>&nbsp;&minus; A programming language is said to use static typing when type checking is performed during compile-time as opposed to run-time.</p>\r\n\r\n<h2>Object-Oriented Programming</h2>\r\n\r\n<p>C++ fully supports object-oriented programming, including the four pillars of object-oriented development &minus;</p>\r\n\r\n<ul>\r\n	<li>Encapsulation</li>\r\n	<li>Data hiding</li>\r\n	<li>Inheritance</li>\r\n	<li>Polymorphism</li>\r\n</ul>\r\n\r\n<h2>Standard Libraries</h2>\r\n\r\n<p>Standard C++ consists of three important parts &minus;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>The core language giving all the building blocks including variables, data types and literals, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>The C++ Standard Library giving a rich set of functions manipulating files, strings, etc.</p>\r\n	</li>\r\n	<li>\r\n	<p>The Standard Template Library (STL) giving a rich set of methods manipulating data structures, etc.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>The ANSI Standard</h2>\r\n\r\n<p>The ANSI standard is an attempt to ensure that C++ is portable; that code you write for Microsoft&#39;s compiler will compile without errors, using a compiler on a Mac, UNIX, a Windows box, or an Alpha.</p>\r\n\r\n<p>The ANSI standard has been stable for a while, and all the major C++ compiler manufacturers support the ANSI standard.</p>\r\n\r\n<h2>Learning C++</h2>\r\n\r\n<p>The most important thing while learning C++ is to focus on concepts.</p>\r\n\r\n<p>The purpose of learning a programming language is to become a better programmer; that is, to become more effective at designing and implementing new systems and at maintaining old ones.</p>\r\n\r\n<p>C++ supports a variety of programming styles. You can write in the style of Fortran, C, Smalltalk, etc., in any language. Each style can achieve its aims effectively while maintaining runtime and space efficiency.</p>\r\n\r\n<h2>Use of C++</h2>\r\n\r\n<p>C++ is used by hundreds of thousands of programmers in essentially every application domain.</p>\r\n\r\n<p>C++ is being highly used to write device drivers and other software that rely on direct manipulation of hardware under realtime constraints.</p>\r\n\r\n<p>C++ is widely used for teaching and research because it is clean enough for successful teaching of basic concepts.</p>\r\n\r\n<p>Anyone who has used either an Apple Macintosh or a PC running Windows has indirectly used C++ because the primary user interfaces of these systems are written in C++.</p>', 2, 12),
(12, '<h1 style=\"text-align:center\">C++ Environment Setup</h1>\r\n\r\n<h2>Local Environment Setup</h2>\r\n\r\n<p>If you are still willing to set up your environment for C++, you need to have the following two softwares on your computer.</p>\r\n\r\n<h3>Text Editor</h3>\r\n\r\n<p>This will be used to type your program. Examples of few editors include Windows Notepad, OS Edit command, Brief, Epsilon, EMACS, and vim or vi.</p>\r\n\r\n<p>Name and version of text editor can vary on different operating systems. For example, Notepad will be used on Windows and vim or vi can be used on windows as well as Linux, or UNIX.</p>\r\n\r\n<p>The files you create with your editor are called source files and for C++ they typically are named with the extension .cpp, .cp, or .c.</p>\r\n\r\n<p>A text editor should be in place to start your C++ programming.</p>\r\n\r\n<h3>C++ Compiler</h3>\r\n\r\n<p>This is an actual C++ compiler, which will be used to compile your source code into final executable program.</p>\r\n\r\n<p>Most C++ compilers don&#39;t care what extension you give to your source code, but if you don&#39;t specify otherwise, many will use .cpp by default.</p>\r\n\r\n<p>Most frequently used and free available compiler is GNU C/C++ compiler, otherwise you can have compilers either from HP or Solaris if you have the respective Operating Systems.</p>\r\n\r\n<h2>Installing GNU C/C++ Compiler</h2>\r\n\r\n<h3>UNIX/Linux Installation</h3>\r\n\r\n<p>If you are using&nbsp;<strong>Linux or UNIX</strong>&nbsp;then check whether GCC is installed on your system by entering the following command from the command line &minus;</p>\r\n\r\n<pre>\r\n$ g++ -v\r\n</pre>\r\n\r\n<p>If you have installed GCC, then it should print a message such as the following &minus;</p>\r\n\r\n<pre>\r\nUsing built-in specs.\r\nTarget: i386-redhat-linux\r\nConfigured with: ../configure --prefix=/usr .......\r\nThread model: posix\r\ngcc version 4.1.2 20080704 (Red Hat 4.1.2-46)\r\n</pre>\r\n\r\n<p>If GCC is not installed, then you will have to install it yourself using the detailed instructions available at&nbsp;<a href=\"https://gcc.gnu.org/install/\" target=\"_blank\">https://gcc.gnu.org/install/</a></p>\r\n\r\n<h3>Mac OS X Installation</h3>\r\n\r\n<p>If you use Mac OS X, the easiest way to obtain GCC is to download the Xcode development environment from Apple&#39;s website and follow the simple installation instructions.</p>\r\n\r\n<p>Xcode is currently available at&nbsp;<a href=\"https://developer.apple.com/technologies/tools/\" target=\"_blank\">developer.apple.com/technologies/tools/</a>.</p>\r\n\r\n<h3>Windows Installation</h3>\r\n\r\n<p>To install GCC at Windows you need to install MinGW. To install MinGW, go to the MinGW homepage,&nbsp;<a href=\"http://www.mingw.org/\" target=\"_blank\">www.mingw.org</a>, and follow the link to the MinGW download page. Download the latest version of the MinGW installation program which should be named MinGW-&lt;version&gt;.exe.</p>\r\n\r\n<p>While installing MinGW, at a minimum, you must install gcc-core, gcc-g++, binutils, and the MinGW runtime, but you may wish to install more.</p>\r\n\r\n<p>Add the bin subdirectory of your MinGW installation to your&nbsp;<strong>PATH</strong>environment variable so that you can specify these tools on the command line by their simple names.</p>\r\n\r\n<p>When the installation is complete, you will be able to run gcc, g++, ar, ranlib, dlltool, and several other GNU tools from the Windows command line.</p>', 3, 13),
(13, '<h1 style=\"text-align:center\">C++ Basic Syntax</h1>\r\n\r\n<p>When we consider a C++ program, it can be defined as a collection of objects that communicate via invoking each other&#39;s methods. Let us now briefly look into what a class, object, methods, and instant variables mean.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p><strong>Object</strong>&nbsp;&minus; Objects have states and behaviors. Example: A dog has states - color, name, breed as well as behaviors - wagging, barking, eating. An object is an instance of a class.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Class</strong>&nbsp;&minus; A class can be defined as a template/blueprint that describes the behaviors/states that object of its type support.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Methods</strong>&nbsp;&minus; A method is basically a behavior. A class can contain many methods. It is in methods where the logics are written, data is manipulated and all the actions are executed.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Instance Variables</strong>&nbsp;&minus; Each object has its unique set of instance variables. An object&#39;s state is created by the values assigned to these instance variables.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>C++ Program Structure</h2>\r\n\r\n<p>Let us look at a simple code that would print the words&nbsp;<em>Hello World</em>.</p>\r\n\r\n<p><a href=\"http://tpcg.io/n4BVuS\" rel=\"nofollow\" target=\"_blank\">&nbsp;Live Demo</a></p>\r\n\r\n<pre>\r\n#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\n// main() is where program execution begins.\r\nint main() {\r\n   cout &lt;&lt; &quot;Hello World&quot;; // prints Hello World\r\n   return 0;\r\n}</pre>\r\n\r\n<p>Let us look at the various parts of the above program &minus;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>The C++ language defines several headers, which contain information that is either necessary or useful to your program. For this program, the header&nbsp;<strong>&lt;iostream&gt;</strong>&nbsp;is needed.</p>\r\n	</li>\r\n	<li>\r\n	<p>The line&nbsp;<strong>using namespace std;</strong>&nbsp;tells the compiler to use the std namespace. Namespaces are a relatively recent addition to C++.</p>\r\n	</li>\r\n	<li>\r\n	<p>The next line &#39;<strong>// main() is where program execution begins.</strong>&#39; is a single-line comment available in C++. Single-line comments begin with // and stop at the end of the line.</p>\r\n	</li>\r\n	<li>\r\n	<p>The line&nbsp;<strong>int main()</strong>&nbsp;is the main function where program execution begins.</p>\r\n	</li>\r\n	<li>\r\n	<p>The next line&nbsp;<strong>cout &lt;&lt; &quot;Hello World&quot;;</strong>&nbsp;causes the message &quot;Hello World&quot; to be displayed on the screen.</p>\r\n	</li>\r\n	<li>\r\n	<p>The next line&nbsp;<strong>return 0;</strong>&nbsp;terminates main( )function and causes it to return the value 0 to the calling process.</p>\r\n	</li>\r\n</ul>\r\n\r\n<h2>Compile and Execute C++ Program</h2>\r\n\r\n<p>Let&#39;s look at how to save the file, compile and run the program. Please follow the steps given below &minus;</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Open a text editor and add the code as above.</p>\r\n	</li>\r\n	<li>\r\n	<p>Save the file as: hello.cpp</p>\r\n	</li>\r\n	<li>\r\n	<p>Open a command prompt and go to the directory where you saved the file.</p>\r\n	</li>\r\n	<li>\r\n	<p>Type &#39;g++ hello.cpp&#39; and press enter to compile your code. If there are no errors in your code the command prompt will take you to the next line and would generate a.out executable file.</p>\r\n	</li>\r\n	<li>\r\n	<p>Now, type &#39;a.out&#39; to run your program.</p>\r\n	</li>\r\n	<li>\r\n	<p>You will be able to see &#39; Hello World &#39; printed on the window.</p>\r\n	</li>\r\n</ul>\r\n\r\n<pre>\r\n$ g++ hello.cpp\r\n$ ./a.out\r\nHello World\r\n</pre>\r\n\r\n<p>Make sure that g++ is in your path and that you are running it in the directory containing file hello.cpp.</p>\r\n\r\n<p>You can compile C/C++ programs using makefile. For more details, you can check our&nbsp;<a href=\"https://www.tutorialspoint.com/makefile/index.htm\" rel=\"nofollow\" target=\"_blank\">&#39;Makefile Tutorial&#39;</a>.</p>\r\n\r\n<h2>Semicolons and Blocks in C++</h2>\r\n\r\n<p>In C++, the semicolon is a statement terminator. That is, each individual statement must be ended with a semicolon. It indicates the end of one logical entity.</p>\r\n\r\n<p>For example, following are three different statements &minus;</p>\r\n\r\n<pre>\r\nx = y;\r\ny = y + 1;\r\nadd(x, y);\r\n</pre>\r\n\r\n<p>A block is a set of logically connected statements that are surrounded by opening and closing braces. For example &minus;</p>\r\n\r\n<pre>\r\n{\r\n   cout &lt;&lt; &quot;Hello World&quot;; // prints Hello World\r\n   return 0;\r\n}\r\n</pre>\r\n\r\n<p>C++ does not recognize the end of the line as a terminator. For this reason, it does not matter where you put a statement in a line. For example &minus;</p>\r\n\r\n<pre>\r\nx = y;\r\ny = y + 1;\r\nadd(x, y);\r\n</pre>\r\n\r\n<p>is the same as</p>\r\n\r\n<pre>\r\nx = y; y = y + 1; add(x, y);\r\n</pre>\r\n\r\n<h2>C++ Identifiers</h2>\r\n\r\n<p>A C++ identifier is a name used to identify a variable, function, class, module, or any other user-defined item. An identifier starts with a letter A to Z or a to z or an underscore (_) followed by zero or more letters, underscores, and digits (0 to 9).</p>\r\n\r\n<p>C++ does not allow punctuation characters such as @, $, and % within identifiers. C++ is a case-sensitive programming language. Thus,&nbsp;<strong>Manpower</strong>and&nbsp;<strong>manpower</strong>&nbsp;are two different identifiers in C++.</p>\r\n\r\n<p>Here are some examples of acceptable identifiers &minus;</p>\r\n\r\n<pre>\r\nmohd       zara    abc   move_name  a_123\r\nmyname50   _temp   j     a23b9      retVal\r\n</pre>\r\n\r\n<h2>C++ Keywords</h2>\r\n\r\n<p>The following list shows the reserved words in C++. These reserved words may not be used as constant or variable or any other identifier names.</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>asm</td>\r\n			<td>else</td>\r\n			<td>new</td>\r\n			<td>this</td>\r\n		</tr>\r\n		<tr>\r\n			<td>auto</td>\r\n			<td>enum</td>\r\n			<td>operator</td>\r\n			<td>throw</td>\r\n		</tr>\r\n		<tr>\r\n			<td>bool</td>\r\n			<td>explicit</td>\r\n			<td>private</td>\r\n			<td>true</td>\r\n		</tr>\r\n		<tr>\r\n			<td>break</td>\r\n			<td>export</td>\r\n			<td>protected</td>\r\n			<td>try</td>\r\n		</tr>\r\n		<tr>\r\n			<td>case</td>\r\n			<td>extern</td>\r\n			<td>public</td>\r\n			<td>typedef</td>\r\n		</tr>\r\n		<tr>\r\n			<td>catch</td>\r\n			<td>false</td>\r\n			<td>register</td>\r\n			<td>typeid</td>\r\n		</tr>\r\n		<tr>\r\n			<td>char</td>\r\n			<td>float</td>\r\n			<td>reinterpret_cast</td>\r\n			<td>typename</td>\r\n		</tr>\r\n		<tr>\r\n			<td>class</td>\r\n			<td>for</td>\r\n			<td>return</td>\r\n			<td>union</td>\r\n		</tr>\r\n		<tr>\r\n			<td>const</td>\r\n			<td>friend</td>\r\n			<td>short</td>\r\n			<td>unsigned</td>\r\n		</tr>\r\n		<tr>\r\n			<td>const_cast</td>\r\n			<td>goto</td>\r\n			<td>signed</td>\r\n			<td>using</td>\r\n		</tr>\r\n		<tr>\r\n			<td>continue</td>\r\n			<td>if</td>\r\n			<td>sizeof</td>\r\n			<td>virtual</td>\r\n		</tr>\r\n		<tr>\r\n			<td>default</td>\r\n			<td>inline</td>\r\n			<td>static</td>\r\n			<td>void</td>\r\n		</tr>\r\n		<tr>\r\n			<td>delete</td>\r\n			<td>int</td>\r\n			<td>static_cast</td>\r\n			<td>volatile</td>\r\n		</tr>\r\n		<tr>\r\n			<td>do</td>\r\n			<td>long</td>\r\n			<td>struct</td>\r\n			<td>wchar_t</td>\r\n		</tr>\r\n		<tr>\r\n			<td>double</td>\r\n			<td>mutable</td>\r\n			<td>switch</td>\r\n			<td>while</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dynamic_cast</td>\r\n			<td>namespace</td>\r\n			<td>template</td>\r\n			<td>&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h2>Trigraphs</h2>\r\n\r\n<p>A few characters have an alternative representation, called a trigraph sequence. A trigraph is a three-character sequence that represents a single character and the sequence always starts with two question marks.</p>\r\n\r\n<p>Trigraphs are expanded anywhere they appear, including within string literals and character literals, in comments, and in preprocessor directives.</p>\r\n\r\n<p>Following are most frequently used trigraph sequences &minus;</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<th>Trigraph</th>\r\n			<th>Replacement</th>\r\n		</tr>\r\n		<tr>\r\n			<td>??=</td>\r\n			<td>#</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??/</td>\r\n			<td>\\</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??&#39;</td>\r\n			<td>^</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??(</td>\r\n			<td>[</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??)</td>\r\n			<td>]</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??!</td>\r\n			<td>|</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??&lt;</td>\r\n			<td>{</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??&gt;</td>\r\n			<td>}</td>\r\n		</tr>\r\n		<tr>\r\n			<td>??-</td>\r\n			<td>~</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>All the compilers do not support trigraphs and they are not advised to be used because of their confusing nature.</p>\r\n\r\n<h2>Whitespace in C++</h2>\r\n\r\n<p>A line containing only whitespace, possibly with a comment, is known as a blank line, and C++ compiler totally ignores it.</p>\r\n\r\n<p>Whitespace is the term used in C++ to describe blanks, tabs, newline characters and comments. Whitespace separates one part of a statement from another and enables the compiler to identify where one element in a statement, such as int, ends and the next element begins.</p>\r\n\r\n<h3>Statement 1</h3>\r\n\r\n<pre>\r\nint age;\r\n</pre>\r\n\r\n<p>In the above statement there must be at least one whitespace character (usually a space) between int and age for the compiler to be able to distinguish them.</p>\r\n\r\n<h3>Statement 2</h3>\r\n\r\n<pre>\r\nfruit = apples + oranges;   // Get the total fruit\r\n</pre>\r\n\r\n<p>In the above statement 2, no whitespace characters are necessary between fruit and =, or between = and apples, although you are free to include some if you wish for readability purpose.</p>', 4, 14),
(14, '<h1 style=\"text-align:center\">Comments in C++</h1>\r\n\r\n<p>Program comments are explanatory statements that you can include in the C++ code. These comments help anyone reading the source code. All programming languages allow for some form of comments.</p>\r\n\r\n<p>C++ supports single-line and multi-line comments. All characters available inside any comment are ignored by C++ compiler.</p>\r\n\r\n<p>C++ comments start with /* and end with */. For example &minus;</p>\r\n\r\n<pre>\r\n/* This is a comment */\r\n\r\n/* C++ comments can also\r\n   * span multiple lines\r\n*/\r\n</pre>\r\n\r\n<p>A comment can also start with //, extending to the end of the line. For example &minus;</p>\r\n\r\n<p><a href=\"http://tpcg.io/Q4esaC\" rel=\"nofollow\" target=\"_blank\">&nbsp;Live Demo</a></p>\r\n\r\n<pre>\r\n#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nmain() {\r\n   cout &lt;&lt; &quot;Hello World&quot;; // prints Hello World\r\n   \r\n   return 0;\r\n}</pre>\r\n\r\n<p>When the above code is compiled, it will ignore&nbsp;<strong>// prints Hello World</strong>&nbsp;and final executable will produce the following result &minus;</p>\r\n\r\n<pre>\r\nHello World\r\n</pre>\r\n\r\n<p>Within a /* and */ comment, // characters have no special meaning. Within a // comment, /* and */ have no special meaning. Thus, you can &quot;nest&quot; one kind of comment within the other kind. For example &minus;</p>\r\n\r\n<pre>\r\n/* Comment out printing of Hello World:\r\n\r\ncout &lt;&lt; &quot;Hello World&quot;; // prints Hello World\r\n\r\n*/</pre>', 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `table_sub_category`
--

CREATE TABLE `table_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `sub_category_order` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_sub_category`
--

INSERT INTO `table_sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_order`, `category_id`) VALUES
(1, 'Lecture 1: Introduction to HTML5', 1, 68),
(2, 'Lecture 2: HTML Editors', 2, 68),
(3, 'Lecture 1: Introduction to CSS3', 1, 69),
(4, 'Lecture 2: CSS Syntax and Selectors', 2, 69),
(5, 'Lecture 3: HTML Basic Examples', 3, 68),
(6, 'Lecture 4: HTML Elements', 4, 68),
(7, 'Lecture 5: HTML Attributes', 5, 68),
(8, 'Lecture 3: CSS How To...', 3, 69),
(9, 'Lecture 4: CSS Colors', 4, 69),
(10, 'Lecture 5: CSS Backgrounds', 5, 69),
(11, 'Lecture 1: C++ Home', 1, 70),
(12, 'Lecture 2: C++ Overview', 2, 70),
(13, 'Lecture 3: C++ Environment Setup', 3, 70),
(14, 'Lecture 4: C++ Basic Syntax', 4, 70),
(15, 'Lecture 5: C++ Comments', 5, 70);

-- --------------------------------------------------------

--
-- Table structure for table `table_top_category`
--

CREATE TABLE `table_top_category` (
  `top_category_id` int(11) NOT NULL,
  `top_category_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `top_category_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_top_category`
--

INSERT INTO `table_top_category` (`top_category_id`, `top_category_name`, `top_category_order`) VALUES
(33, 'Programming', 1),
(34, 'Website', 2),
(35, 'Network', 3),
(36, 'Database', 4),
(37, 'Data Science', 5),
(38, 'Blockchain', 6);

-- --------------------------------------------------------

--
-- Table structure for table `table_user`
--

CREATE TABLE `table_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirm_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `table_user`
--

INSERT INTO `table_user` (`user_id`, `user_name`, `email`, `confirm_email`, `password`) VALUES
(10, 'linkin', 'shomnathcse22@gmail.com', '26326951', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_lecture`
--
ALTER TABLE `table_lecture`
  ADD PRIMARY KEY (`lecture_id`);

--
-- Indexes for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `table_top_category`
--
ALTER TABLE `table_top_category`
  ADD PRIMARY KEY (`top_category_id`);

--
-- Indexes for table `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `table_lecture`
--
ALTER TABLE `table_lecture`
  MODIFY `lecture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `table_sub_category`
--
ALTER TABLE `table_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_top_category`
--
ALTER TABLE `table_top_category`
  MODIFY `top_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `table_user`
--
ALTER TABLE `table_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
