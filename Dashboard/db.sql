-- Create the User table (generalized entity)
CREATE TABLE User (
    UserID INT PRIMARY KEY,
    FullName VARCHAR(100) NOT NULL,
    Username VARCHAR(50) UNIQUE NOT NULL,
    Password VARCHAR(255) NOT NULL,
    Email VARCHAR(100) UNIQUE,
    NotificationPreferences VARCHAR(50)
);

-- Specialized User Types: Citizen
CREATE TABLE Citizen (
    CitizenID INT PRIMARY KEY,
    UserID INT UNIQUE NOT NULL,
    Name VARCHAR(100),
    DateOfBirth DATE,
    Nationality VARCHAR(50),
    MaritalStatus VARCHAR(20),
    Occupation VARCHAR(50),
    Address_Present VARCHAR(255),
    Address_Permanent VARCHAR(255),
    ContactInfo VARCHAR(100),
    Age AS (YEAR(CURDATE()) - YEAR(DateOfBirth)),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Specialized User Types: Expat
CREATE TABLE Expat (
    ExpatID INT PRIMARY KEY,
    UserID INT UNIQUE NOT NULL,
    VisaType VARCHAR(50),
    WorkPermitStatus VARCHAR(50),
    ExpectedDepartureDate DATE,
    EntryDate DATE,
    BankAccount VARCHAR(50),
    Origin VARCHAR(50),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- NID_Card
CREATE TABLE NID_Card (
    NID INT PRIMARY KEY,
    CitizenID INT UNIQUE NOT NULL,
    FathersName VARCHAR(100),
    MothersName VARCHAR(100),
    DateOfIssue DATE,
    ExpiryDate DATE,
    BloodType CHAR(3),
    PlaceOfBirth VARCHAR(100),
    Signature BLOB,
    FOREIGN KEY (CitizenID) REFERENCES Citizen(CitizenID)
);

-- Government Department
CREATE TABLE GovernmentDepartment (
    DepartmentID INT PRIMARY KEY,
    DepartmentName VARCHAR(100) NOT NULL,
    FoundingDate DATE,
    Location VARCHAR(100),
    Budget DECIMAL(15, 2),
    NumberOfEmployees INT,
    ContactInfo VARCHAR(100),
    KeyPolicies TEXT
);

-- Government Official
CREATE TABLE GovernmentOfficial (
    OfficialID INT PRIMARY KEY,
    UserID INT UNIQUE NOT NULL,
    EmploymentType VARCHAR(50),
    DateOfAppointment DATE,
    Rank VARCHAR(50),
    WorkLocation VARCHAR(100),
    Supervisor INT,
    TrainingRecords TEXT,
    Role VARCHAR(50),
    FOREIGN KEY (UserID) REFERENCES User(UserID),
    FOREIGN KEY (Supervisor) REFERENCES GovernmentOfficial(OfficialID)
);

-- Services
CREATE TABLE Services (
    ServiceID INT PRIMARY KEY,
    ServiceType VARCHAR(100),
    ServiceDescription TEXT,
    ApplicationProcess TEXT,
    PriorityLevel VARCHAR(20),
    DocumentsRequired TEXT,
    ServiceHistory TEXT
);

-- Service Requests
CREATE TABLE ServiceRequest (
    RequestID INT PRIMARY KEY,
    CitizenID INT NOT NULL,
    ServiceID INT NOT NULL,
    RequestStatus VARCHAR(50),
    RequestDescription TEXT,
    SupportingEvidence TEXT,
    FOREIGN KEY (CitizenID) REFERENCES Citizen(CitizenID),
    FOREIGN KEY (ServiceID) REFERENCES Services(ServiceID)
);

-- Pending Requests (specialization)
CREATE TABLE PendingRequest (
    RequestID INT PRIMARY KEY,
    SubmissionDate DATE,
    LastUpdatedDate DATE,
    DepartmentInCharge INT,
    FollowUpRequirement BOOLEAN,
    FOREIGN KEY (RequestID) REFERENCES ServiceRequest(RequestID),
    FOREIGN KEY (DepartmentInCharge) REFERENCES GovernmentDepartment(DepartmentID)
);

-- Completed Requests (specialization)
CREATE TABLE CompletedRequest (
    RequestID INT PRIMARY KEY,
    CompletionDate DATE,
    ApprovalStatus VARCHAR(50),
    ResolutionSummary TEXT,
    FinalProcessing TEXT,
    FOREIGN KEY (RequestID) REFERENCES ServiceRequest(RequestID)
);

-- Service Feedback
CREATE TABLE ServiceFeedback (
    FeedbackID INT PRIMARY KEY,
    RequestID INT NOT NULL,
    FeedbackDate DATE,
    Comments TEXT,
    Rating INT CHECK (Rating BETWEEN 1 AND 5),
    FinalDocumentIssued TEXT,
    FOREIGN KEY (RequestID) REFERENCES ServiceRequest(RequestID)
);

-- Notifications
CREATE TABLE Notifications (
    NotificationID INT PRIMARY KEY,
    UserID INT NOT NULL,
    Message TEXT,
    NotificationType VARCHAR(50),
    DateSent DATE,
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);