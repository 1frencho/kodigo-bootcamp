const studentGrades = [7, 8, 6.5, 5, 4, 9, 8.2];

function evaluateStudents(grades) {
  let approvedCount = 0;
  let approvedGrades = [];
  let onTrackCount = 0;
  let onTrackGrades = [];
  let failedCount = 0;
  let failedGrades = [];

  for (let i = 0; i < grades.length; i++) {
    const grade = grades[i];
    if (grade >= 7) {
      approvedGrades.push(grade);
      approvedCount++;
    } else if (grade >= 5) {
      onTrackCount++;
      onTrackGrades.push(grade);
    } else {
      failedCount++;
      failedGrades.push(grade);
    }
  }

  return {
    approved: {
      approvedCount,
      approvedGrades,
    },
    onTrack: {
      onTrackCount,
      onTrackGrades,
    },
    failed: {
      failedCount,
      failedGrades,
    },
  };
}

console.log(evaluateStudents(studentGrades));
