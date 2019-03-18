package App.Listener;

import App.Event.EventInterface;
import App.Event.Listener;
import Overseer.Event.NewSubjectEvent;

public class SubjectLogListener implements Listener {
    public void execute(EventInterface event) {
        System.out.println("Game started observing " + ((NewSubjectEvent) event).getSubjectClass());
    }
}
