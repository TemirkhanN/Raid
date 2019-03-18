package Overseer.Event;

import App.Event.EventInterface;
import Overseer.Subject;

public class NewSubjectEvent implements EventInterface {
    private Subject subject;

    public NewSubjectEvent(Subject subject) {
        this.subject = subject;
    }

    public String getSubjectClass() {
        return subject.getClass().getSimpleName();
    }
}
