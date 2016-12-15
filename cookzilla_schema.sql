CREATE TABLE recipes (
   rid		int	auto_increment,
   title       	varchar(40),
   username	varchar(40),
   servings	int(2),
   steps		varchar(1000),
   pic		longblob,
   primary key (rid),
   foreign key (username) references users(email)
);

CREATE TABLE ingredients (
   rid		int,
   ingredient 	varchar(40),
   quantity	int(5),
   unit		varchar(20),
   primary key (rid, ingredient),
   foreign key (rid) references recipes(rid),
   foreign key (unit) references units(unit)
);

CREATE TABLE users (
   email    	varchar(40),
   name        	varchar(40),
   password  	varchar(16),
   primary key (email)
);

CREATE TABLE tags (
   tagname	varchar(40),
   primary key (tagname)
);

CREATE TABLE recipe_tags (
   rid		int,
   tagname     	varchar(40),
   primary key (rid, tagname),
   foreign key (rid) references recipes(rid),
   foreign key (tagname) references tags(tagname)
);

CREATE TABLE reviews (
   reviewid	int auto_increment,
   rid         	int,
   username	varchar(40),
   reviewtitle	varchar(40),
   rating		int(1),
   reviewtext	varchar(500),
   suggestion	varchar(200),
   primary key (reviewid),
   foreign key (username) references users(email),
   foreign key (rid) references recipes(rid)
);

CREATE TABLE likes (
   rid         	int,
   username    	varchar(40),
   primary key (rid, username),
   foreign key (username) references users(email),
   foreign key (rid) references recipes(rid)
);

CREATE TABLE groups (
   groupname	varchar(40),
   description	varchar(500),
   creator     	varchar(40),
   pic		longblob,
   primary key (groupname),
   foreign key (creator) references users(email)
);

CREATE TABLE joins (
   groupname	varchar(40),
   username	varchar(40),
   primary key (groupname, username),
   foreign key (username) references users(email), 
   foreign key (groupname) references groups(groupname)   
);
 
CREATE TABLE events (
   eid		int auto_increment,
   eventname	varchar(40),
   groupname	varchar(40),
   location	varchar(40),
   eventtime	varchar(40),
   description	varchar(500),  
   pic		longblob,
   primary key (eid),
   foreign key (groupname) references groups(groupname)   
);
 
CREATE TABLE reports (
   reportid    	int(16) auto_increment,
   eid        	int,
   username	varchar(40),
   content	varchar(500),
   pic		longblob,
   primary key (reportid),
   foreign key (username) references users(email),
   foreign key (eid) references events(eid)   
);

CREATE TABLE rsvps (
   eid		int,
   username	varchar(40),  		
   primary key (eid, username),
   foreign key (username) references users(email),
   foreign key (eid) references events(eid)   
);

CREATE TABLE profiles (
   username    	varchar(40),
   profile     	varchar(200),
   pic		longblob,
   primary key (username, profile),
   foreign key (username) references users(email) 
);

CREATE TABLE searchLog (
   reportid int auto_increment,
   keyword  varchar(40),
   username varchar(40),    
   primary key (reportid),
   foreign key (username) references users(email)
);

